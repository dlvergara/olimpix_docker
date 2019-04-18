<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jinete".
 *
 * @property int $id_jinete
 * @property int $club_id_club
 * @property string $nombre_completo
 * @property string $tipo_identificacion
 * @property string $identificacion
 * @property int $liga_id_liga
 * @property int $pais_id_pais
 * @property string $fecha_nacimiento
 * @property string $registro_fec
 * @property int $activo_fec
 * @property int $activo_equi
 * @property string $email
 * @property string $telefono
 * @property string $direccion
 *
 * @property CaballoHasJinete[] $caballoHasJinetes
 * @property DisciplinaHasJinete[] $disciplinaHasJinetes
 * @property Liga $ligaIdLiga
 * @property Pais $paisIdPais
 * @property Club $clubIdClub
 * @property ServicioContratado[] $servicioContratados
 */
class Jinete extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jinete';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['club_id_club', 'liga_id_liga', 'pais_id_pais'], 'required'],
            [['club_id_club', 'liga_id_liga', 'pais_id_pais', 'activo_fec', 'activo_equi'], 'integer'],
            [['nombre_completo', 'tipo_identificacion', 'email', 'direccion'], 'string'],
            [['fecha_nacimiento'], 'safe'],
            [['identificacion', 'registro_fec'], 'string', 'max' => 45],
            [['telefono'], 'string', 'max' => 20],
            [['liga_id_liga'], 'exist', 'skipOnError' => true, 'targetClass' => Liga::className(), 'targetAttribute' => ['liga_id_liga' => 'id_liga']],
            [['pais_id_pais'], 'exist', 'skipOnError' => true, 'targetClass' => Pais::className(), 'targetAttribute' => ['pais_id_pais' => 'id_pais']],
            [['club_id_club'], 'exist', 'skipOnError' => true, 'targetClass' => Club::className(), 'targetAttribute' => ['club_id_club' => 'id_club']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jinete' => 'Id Jinete',
            'club_id_club' => 'Club Id Club',
            'nombre_completo' => 'Nombre Completo',
            'tipo_identificacion' => 'Tipo Identificacion',
            'identificacion' => 'Identificacion',
            'liga_id_liga' => 'Liga Id Liga',
            'pais_id_pais' => 'Pais Id Pais',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'registro_fec' => 'Registro Fec',
            'activo_fec' => 'Activo Fec',
            'activo_equi' => 'Activo Equi',
            'email' => 'Email',
            'telefono' => 'Telefono',
            'direccion' => 'Direccion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaballoHasJinetes()
    {
        return $this->hasMany(CaballoHasJinete::className(), ['id_jinete' => 'id_jinete']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinaHasJinetes()
    {
        return $this->hasMany(DisciplinaHasJinete::className(), ['jinete_id_jinete' => 'id_jinete']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLigaIdLiga()
    {
        return $this->hasOne(Liga::className(), ['id_liga' => 'liga_id_liga']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaisIdPais()
    {
        return $this->hasOne(Pais::className(), ['id_pais' => 'pais_id_pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClubIdClub()
    {
        return $this->hasOne(Club::className(), ['id_club' => 'club_id_club']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioContratados()
    {
        return $this->hasMany(ServicioContratado::className(), ['jinete_id_jinete' => 'id_jinete']);
    }
}
