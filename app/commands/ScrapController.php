<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Caballo;
use app\models\CaballoHasJinete;
use app\models\Club;
use app\models\Jinete;
use app\models\Liga;
use app\models\Pais;
use Sunra\PhpSimple\HtmlDomParser;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;
use PHPHtmlParser\Dom;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ScrapController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @return int Exit code
     * @throws \PHPHtmlParser\Exceptions\ChildNotFoundException
     * @throws \PHPHtmlParser\Exceptions\CircularException
     * @throws \PHPHtmlParser\Exceptions\CurlException
     * @throws \PHPHtmlParser\Exceptions\LogicalException
     * @throws \PHPHtmlParser\Exceptions\NotLoadedException
     * @throws \PHPHtmlParser\Exceptions\StrictException
     */
    public function actionIndex()
    {
        $baseWebUrl = "https://online.equipe.com/meetings/31325";
        $directory = getcwd() . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR;

        if (file_exists('equipe.html')) {
            $html = HtmlDomParser::file_get_html(getcwd() . DIRECTORY_SEPARATOR . 'equipe.html');
        } else {
            $html = HtmlDomParser::file_get_html('http://online.equipe.com/meetings/31325');
        }

        $html->find('head', 0)->innertext = '';
        //$this->stdout($html, Console::BOLD);

        $links = $html->find('a.link');

        var_dump(count($links));
        echo chr(10);
        foreach ($links as $link) {
            //echo $link->getAttribute('href'), ' --> '.strpos($link->getAttribute('href'), '/es/class_sections/'), chr(10);
            if (strpos($link->getAttribute('href'), '/es/class_sections/') === 0) {
                $url = $link->getAttribute('href');
                //echo $link->outertext(), ' -- '. $link->getAttribute('href'), chr(10);
                $urlSeg = explode('/', $url);
                $fileName = $urlSeg[3];
                $saveUrl = $directory . $fileName . '.html';

                echo 'https://online.equipe.com/' . $url, chr(10);
                if (file_exists($saveUrl)) {
                    echo 'pre existent file', chr(10);
                } else {
                    //https://online.equipe.com/api/v1/class_sections/418271/results.html
                    $htmlChild = file_get_contents('http://online.equipe.com/api/v1/class_sections/' . $fileName . '/results.html');
                    file_put_contents($saveUrl, $htmlChild);
                }
            }
        }

        $ficheros1 = scandir($directory);
        foreach ($ficheros1 as $file) {
            if ($file != '.' && $file != '..') {
                echo $file, chr(10);
                $html = HtmlDomParser::file_get_html($directory . $file);
                $rows = $html->find('tr');
                $count = 0;
                foreach ($rows as $row) {
                    if ($count > 0) {
                        try {
                            $imagen = $row->find('span', 0)->getAttribute('delayed-image-url');
                            $bandera = str_ireplace('https://d2jhih8nxbsr0w.cloudfront.net/logos/flags48/', '', $imagen);

                            $paisObj = $row->find('.ioc', 0);
                            if ($paisObj) {
                                $pais = $row->find('.ioc', 0)->innertext();
                            } else {
                                throw new  \Exception("Pais not found");
                            }

                            $raiderLink = $row->find('.rider-name', 0)->find('a', 0)->innertext();
                            $pedigree = $row->find('.pedigree', 0)->find('a', 0)->innertext();

                            echo $bandera, ' -- ', $pais, ' -- ', $raiderLink, ' -- ', $pedigree, chr(10);

                            $saved = $this->saveModels($imagen, $bandera, $pais, $raiderLink, $pedigree);
                            echo 'saved: ' . intval($saved), chr(10), chr(10);
                        } catch (\Exception $ex) {
                            echo 'Error: ' . $row->outertext(), chr(10), chr(10);
                        }
                    }
                    $count++;
                }
            }
        }

        return ExitCode::OK;
    }

    /**
     * @param $image
     * @param $bandera
     * @param $pais
     * @param $raider
     * @param $pedigree
     * @return bool
     */
    public function saveModels($image, $bandera, $pais, $raider, $pedigree)
    {
        $club = $this->findOrSaveClub($bandera, $image);
        $pais = $this->findOrSavePais($pais);
        $jinete = $this->findOrSaveJinete($club, $raider, $pais);
        $caballo = $this->saveCaballo($pedigree, $jinete, $club);
        $caballoJinete = $this->saveCaballoJinete($caballo, $jinete);

        return $caballoJinete->isNewRecord;
    }

    /**
     * @param $pais
     * @return Pais|array|\yii\db\ActiveRecord|null
     */
    public function findOrSavePais($pais)
    {
        $model = Pais::find()->where(['nombre' => $pais])->one();
        if (empty($model)) {
            $model = new Pais();
            $model->nombre = $pais;
            $res = $model->save();
            if (!$res) {
                var_dump($model->getErrors());
                exit;
            }
        }

        return $model;
    }

    /**
     * @param $bandera
     * @param $image
     * @return Club|\yii\db\ActiveQuery
     */
    protected function findOrSaveClub($bandera, $image)
    {
        $club = Club::find()->where(['nombre' => $bandera])->one();
        if (empty($club)) {
            $club = new Club();
            $club->nombre = $bandera;
            $club->imagen = $image;
            $res = $club->save();
            if (!$res) {
                var_dump($club->getErrors());
                exit;
            }
        }

        return $club;
    }

    /**
     * @param $bandera
     * @param $image
     * @return Liga|\yii\db\ActiveQuery
     */
    protected function findOrSaveLiga($nombre)
    {
        $club = Liga::find()->where(['nombre' => $nombre])->one();
        if (empty($club)) {
            $club = new Liga();
            $club->nombre = $nombre;
            $res = $club->save();
            if (!$res) {
                var_dump($club->getErrors());
                exit;
            }
        }

        return $club;
    }

    /**
     * @param Club $club
     * @param $raider
     * @return Jinete|\yii\db\ActiveQuery
     */
    private function findOrSaveJinete(Club $club, $raider, Pais $pais)
    {
        $jinete = Jinete::find()->where(['nombre_completo' => $raider])->one();
        if (empty($jinete)) {
            $jinete = new Jinete();
            $jinete->nombre_completo = $raider;
            $jinete->club_id_club = $club->id_club;
            $jinete->liga_id_liga = 3;
            $jinete->pais_id_pais = $pais->id_pais;
            $res = $jinete->save();
            if (!$res) {
                var_dump($jinete->getErrors());
                exit;
            }
        }

        return $jinete;
    }

    /**
     * @param $nombreCaballo
     * @param Jinete $jinete
     * @param Club $club
     * @return Caballo
     */
    protected function saveCaballo($nombreCaballo, Jinete $jinete, Club $club, &$encontrado)
    {
        $nombreCaballo = trim($nombreCaballo);
        $caballo = Caballo::find()->where(['nombre' => $nombreCaballo])->one();
        if (empty($caballo)) {
            $caballo = new Caballo();
            $caballo->liga_id_liga = 3;
            $caballo->club_id_club = $club->id_club;
            $caballo->nombre = $nombreCaballo;
            $res = $caballo->save();
            if (!$res) {
                var_dump($caballo->getErrors());
                exit;
            }
        } else {
            $encontrado++;
        }

        return $caballo;
    }

    /**
     * @param Caballo $caballo
     * @param Jinete $jinete
     * @return CaballoHasJinete
     */
    protected function saveCaballoJinete(Caballo $caballo, Jinete $jinete)
    {
        $caballoJinete = CaballoHasJinete::find()->where(['id_caballo' => $caballo->id_caballo, 'id_jinete' => $jinete->id_jinete])->one();
        if (empty($caballoJinete)) {
            $caballoJinete = new CaballoHasJinete();
            $caballoJinete->id_caballo = $caballo->id_caballo;
            $caballoJinete->id_jinete = $jinete->id_jinete;
            $res = $caballoJinete->save();
            if (!$res) {
                var_dump($caballoJinete->getErrors());
                exit;
            }
        }

        return $caballoJinete;
    }

}
