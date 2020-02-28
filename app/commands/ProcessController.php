<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\CaballoHasJinete;
use app\models\Club;
use app\models\Jinete;
use app\models\Liga;
use app\models\Pais;
use app\models\PruebaSalto;
use app\models\ResultadoSalto;
use yii\console\Controller;
use yii\console\ExitCode;
use Smalot\PdfParser\Parser;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ProcessController extends ScrapController
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     * @throws \Exception
     */
    public function actionIndex()
    {
        echo '--> ' . date('Y-m-d H:i:s'), chr(10);

        $dataDir = getcwd() . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR;
        $fileName = 'ORDEN-PARTICIPACION-CSN3';
        $fileName = $dataDir . 'op-' . $fileName . '.txt';
        if (file_exists($fileName)) {
            echo 'Procesando archivo...', chr(10);
            //$data = file_get_contents($fileName);
            $data = file($fileName);
            $pruebas = $this->extraerPruebas($data);
            $pruebasProcesadas = $this->procesarPruebas($pruebas);
            $this->procesarJinetes($pruebasProcesadas);
        }

        echo 'fin del proceso.', chr(10);
        return ExitCode::OK;
    }

    /**
     * @param $data
     * @return array
     */
    private function extraerPruebas(array $data)
    {
        $pruebas = [];
        $pruebasIndex = [];
        foreach ($data as $index => $row) {
            if (preg_match("~\bPRUEBA\b~", $row)) {
                //echo $index . ' --> ' .$row, chr(10);
                $pruebasIndex[$index] = trim($row);
            }
        }

        $llaves = array_keys($pruebasIndex);
        foreach ($llaves as $index => $idPrueba) {
            $prueba = $pruebasIndex[$idPrueba];
            //echo $prueba, chr(10);
            $fin = end($llaves);

            if (isset($llaves[$index + 1]) || $idPrueba == $fin) {
                $idPruebaSig = $llaves[$index + 1];
                if ($idPrueba == $fin) {
                    $idPruebaSig = count($data);
                }
                for ($i = ($idPrueba); $i <= ($idPruebaSig - 2); $i++) {
                    $fila = trim($data[$i]);
                    //echo $data[$i];
                    if (!empty($fila)) {
                        $pruebas[$idPrueba][] = $fila;
                    }
                }
            }
        }
        return $pruebas;
    }

    /**
     * @param array $pruebas
     * @return array
     * @throws \Exception
     */
    private function procesarPruebas(ARRAY $pruebas)
    {
        //var_dump( $pruebas );
        $pruebasProcesadas = [];
        foreach ($pruebas as $prueba) {
            $nombrePrueba = str_ireplace("PRUEBA:", '', str_ireplace(" ", '', $prueba[0]));
            $fechaPrueba = str_ireplace("FECHA:", '', str_ireplace(" ", '', $prueba[2]));
            $horaPrueba = str_ireplace("HORA:", '', str_ireplace(" ", '', $prueba[3]));
            $total = end($prueba);

            $pruebasProcesadas[$nombrePrueba] = [
                'fecha' => $fechaPrueba,
                'hora' => $horaPrueba,
            ];
            for ($i = 5; $i < count($prueba) - 1; $i++) {
                $pruebasProcesadas[$nombrePrueba]['rows'][] = $prueba[$i];
            }
            if (count($pruebasProcesadas[$nombrePrueba]['rows']) !== intval($total)) {
                var_dump(count($pruebasProcesadas[$nombrePrueba]['rows']));
                var_dump($pruebasProcesadas[$nombrePrueba]['rows']);
                var_dump($total);
                var_dump($prueba);
                throw new \Exception("No coincide");
            }
        }

        return $pruebasProcesadas;
    }

    /**
     * @param array $pruebasProcesadas
     * @throws \Exception
     */
    private function procesarJinetes(array $pruebasProcesadas)
    {
        $procesados = 0;
        $encontrado = 0;
        $caballoEncontrado = 0;
        $idEvento = 4;
        foreach ($pruebasProcesadas as $idPrueba => $prueba) {
            if (strpos($idPrueba, 'A')) {
                $idPrueba = intval($idPrueba) + 0.1;
            }
            echo 'Prueba: ' . $idPrueba, chr(10);

            try {
                $pruebaData = PruebaSalto::find()->where(['evento_id_evento' => $idEvento, 'orden' => $idPrueba])->one();
                if (empty($pruebaData)) {
                    throw new \Exception('Prueba ' . $idPrueba . ' No encontrada');
                }
                echo $pruebaData->nombre, chr(10);

                foreach ($prueba['rows'] as $row) {
                    $procesados++;
                    $dataJinete = explode('-', $row);

                    echo print_r($dataJinete, true), ' --> ';

                    $idJinete = explode('   ', trim($dataJinete[0]));
                    $dataJinete[3] = trim($dataJinete[3]);
                    $jinete = explode('   ', $dataJinete[3]);
                    $datosCaballo = explode('   ', trim($dataJinete[5]));

                    $ordenParticipacion = intval($idJinete[0]);
                    $idJinete = $idJinete[1];
                    $paisTxt = trim($dataJinete[2]);
                    $nombreJinete = str_ireplace("  ", ' ', trim($jinete[0]));
                    //$idCaballo = $jinete[1];
                    $nombreLiga = str_ireplace(' ', '', trim($datosCaballo[1]));
                    $nombreCaballo = trim($datosCaballo[0]);

                    echo 'Pa - ' . $paisTxt . ' ...';
                    $pais = $this->findOrSavePais($paisTxt);
                    echo 'Cl - ' . $paisTxt . ' ... ';
                    $club = $this->findOrSaveClub($paisTxt, '');
                    echo 'L - ' . $nombreLiga . ' ...';
                    $liga = $this->findOrSaveLiga($nombreLiga);

                    echo 'J...';
                    $jineteDb = $this->findOrSaveJinete($nombreJinete, $idJinete, $club, $pais, $liga, $encontrado);

                    echo 'C...';
                    $caballo = $this->saveCaballo($nombreCaballo, $jineteDb, $club, $caballoEncontrado);

                    echo 'CJ...';
                    $caballoJinete = $this->saveCaballoJinete($caballo, $jineteDb);

                    echo 'P...';
                    $this->saveResultadoPrueba($caballoJinete, $pruebaData, $ordenParticipacion);
                    echo chr(10);

                }
            } catch (\Exception $ex) {
                echo $ex->getMessage(), chr(10), chr(10);
            }
        }

        echo 'Procesados: ' . $procesados, chr(10);
        echo 'Encontrados: ' . $encontrado, chr(10);
        echo 'CaballoEncontrado: ' . $caballoEncontrado, chr(10);
    }


    /**
     * @param Club $club
     * @param $raider
     * @return Jinete|\yii\db\ActiveQuery
     */
    private function findOrSaveJinete($raider, $id, Club $club, Pais $pais, Liga $liga, &$encontrado)
    {
        $jinete = Jinete::find()->where(['nombre_completo' => $raider])->one();
        if (empty($jinete)) {
            $jinete = new Jinete();
            $jinete->nombre_completo = $raider;
            $jinete->club_id_club = $club->id_club;
            $jinete->registro_fec = $id;
            $jinete->liga_id_liga = $liga->id_liga;
            $jinete->pais_id_pais = $pais->id_pais;
            $res = $jinete->save();
            if (!$res) {
                var_dump($jinete->getErrors());
                exit;
            }
        } else {
            $encontrado++;
        }

        return $jinete;
    }

    /**
     * @param CaballoHasJinete $caballoJinete
     * @param PruebaSalto $prueba
     * @param $ordenParticipacion
     * @return ResultadoSalto|array|\yii\db\ActiveRecord|null
     */
    private function saveResultadoPrueba(CaballoHasJinete $caballoJinete, PruebaSalto $prueba, $ordenParticipacion)
    {
        $resultadoPrueba = ResultadoSalto::find()->where(['id_caballo_has_jinete' => $caballoJinete->id_caballo_has_jinete, 'id_prueba' => $prueba->id_prueba])->one();
        if (empty($resultadoPrueba)) {
            $resultadoPrueba = new ResultadoSalto();
            $resultadoPrueba->id_caballo_has_jinete = $caballoJinete->id_caballo_has_jinete;
            $resultadoPrueba->id_prueba = $prueba->id_prueba;
            $resultadoPrueba->orden_participacion = $ordenParticipacion;

            $res = $resultadoPrueba->save();
            //echo chr(10), $res, chr(10);
            if (!$res) {
                var_dump($resultadoPrueba->getErrors());
                exit;
            }
        }
        return $resultadoPrueba;
    }
}
