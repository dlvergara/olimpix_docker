<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caballo".
 *
 * @property int $id_caballo
 * @property string $nombre
 * @property string $fecha_nacimiento
 * @property string $fecha_grado
 * @property string $puntaje
 * @property string $identificacion
 * @property int $raza_id_raza
 * @property int $id_caballo_padre
 * @property int $id_caballo_madre
 * @property int $id_propietario
 * @property string $registro_fec
 * @property string $pasaporte_fec
 * @property int $vigente_ica
 * @property string $fecha_vigencia_ica
 * @property int $vigente_fec
 * @property string $fecha_vigencia_fec
 * @property string $num_microchip_principal
 * @property int $liga_id_liga
 * @property int $club_id_club
 *
 * @property Caballo $caballoPadre
 * @property Caballo[] $caballos
 * @property Caballo $caballoMadre
 * @property Caballo[] $caballos0
 * @property Club $clubIdClub
 * @property Liga $ligaIdLiga
 * @property Propietario $propietario
 * @property Raza $razaIdRaza
 * @property CaballoHasJinete[] $caballoHasJinetes
 * @property Certificado[] $certificados
 * @property ServicioContratado[] $servicioContratados
 */
class Caballo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'caballo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_nacimiento', 'fecha_grado', 'fecha_vigencia_ica', 'fecha_vigencia_fec'], 'safe'],
            [['puntaje'], 'number'],
            [['raza_id_raza', 'id_caballo_padre', 'id_caballo_madre', 'id_propietario', 'liga_id_liga', 'club_id_club'], 'required'],
            [['raza_id_raza', 'id_caballo_padre', 'id_caballo_madre', 'id_propietario', 'vigente_ica', 'vigente_fec', 'liga_id_liga', 'club_id_club'], 'integer'],
            [['nombre', 'identificacion', 'registro_fec', 'pasaporte_fec', 'num_microchip_principal'], 'string', 'max' => 45],
            [['id_caballo_padre'], 'exist', 'skipOnError' => true, 'targetClass' => Caballo::className(), 'targetAttribute' => ['id_caballo_padre' => 'id_caballo']],
            [['id_caballo_madre'], 'exist', 'skipOnError' => true, 'targetClass' => Caballo::className(), 'targetAttribute' => ['id_caballo_madre' => 'id_caballo']],
            [['club_id_club'], 'exist', 'skipOnError' => true, 'targetClass' => Club::className(), 'targetAttribute' => ['club_id_club' => 'id_club']],
            [['liga_id_liga'], 'exist', 'skipOnError' => true, 'targetClass' => Liga::className(), 'targetAttribute' => ['liga_id_liga' => 'id_liga']],
            [['id_propietario'], 'exist', 'skipOnError' => true, 'targetClass' => Propietario::className(), 'targetAttribute' => ['id_propietario' => 'id_propietario']],
            [['raza_id_raza'], 'exist', 'skipOnError' => true, 'targetClass' => Raza::className(), 'targetAttribute' => ['raza_id_raza' => 'id_raza']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_caballo' => 'Id Caballo',
            'nombre' => 'Nombre',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'fecha_grado' => 'Fecha Grado',
            'puntaje' => 'Puntaje',
            'identificacion' => 'Identificacion',
            'raza_id_raza' => 'Raza',
            'id_caballo_padre' => 'Caballo Padre',
            'id_caballo_madre' => 'Caballo Madre',
            'id_propietario' => 'Propietario',
            'registro_fec' => 'Registro Fec',
            'pasaporte_fec' => 'Pasaporte Fec',
            'vigente_ica' => 'Vigente Ica',
            'fecha_vigencia_ica' => 'Fecha Vigencia Ica',
            'vigente_fec' => 'Vigente Fec',
            'fecha_vigencia_fec' => 'Fecha Vigencia Fec',
            'num_microchip_principal' => 'Num Microchip',
            'liga_id_liga' => 'Liga',
            'club_id_club' => 'Club',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaballoPadre()
    {
        return $this->hasOne(Caballo::className(), ['id_caballo' => 'id_caballo_padre']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaballos()
    {
        return $this->hasMany(Caballo::className(), ['id_caballo_padre' => 'id_caballo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaballoMadre()
    {
        return $this->hasOne(Caballo::className(), ['id_caballo' => 'id_caballo_madre']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaballos0()
    {
        return $this->hasMany(Caballo::className(), ['id_caballo_madre' => 'id_caballo']);
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
    public function getLigaIdLiga()
    {
        return $this->hasOne(Liga::className(), ['id_liga' => 'liga_id_liga']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropietario()
    {
        return $this->hasOne(Propietario::className(), ['id_propietario' => 'id_propietario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRazaIdRaza()
    {
        return $this->hasOne(Raza::className(), ['id_raza' => 'raza_id_raza']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaballoHasJinetes()
    {
        return $this->hasMany(CaballoHasJinete::className(), ['id_caballo' => 'id_caballo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCertificados()
    {
        return $this->hasMany(Certificado::className(), ['caballo_id_caballo' => 'id_caballo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioContratados()
    {
        return $this->hasMany(ServicioContratado::className(), ['caballo_id_caballo' => 'id_caballo']);
    }
}
