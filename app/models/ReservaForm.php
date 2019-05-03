<?php

namespace app\models;

use Yii;

class ReservaForm extends \yii\base\Model
{
    public $servicio;
    public $cantidad;
    public $subtotal;
    public $montoComisionOlimpix;
    public $montoIva;

    /**
     * @var ServicioDisponible
     */
    protected $servicioModel;

    public function rules()
    {
        return [
            [['cantidad'], 'required'],
            [['servicio', 'cantidad'], 'integer'],
            [['servicio', 'cantidad', 'name', 'phone', 'email'], 'required', 'on' => 'pagar'],
        ];
    }

    /**
     * @return array|\yii\db\ActiveRecord|null
     */
    public function getServicioModel()
    {
        $servicioDisponible = ServicioDisponible::find()->where(['id_servicio_disponible' => $this->servicio])->one();
        if (empty($servicioDisponible)) {
            $this->addError('servicio', 'Servicio no encontrado');
        }
        $this->servicioModel = $servicioDisponible;
        $this->subtotal = floatval($servicioDisponible->monto) * intval($this->cantidad);
        return $servicioDisponible;
    }

    /**
     * @return ServicioDisponible
     */
    public function getServicioDisponible()
    {
        return $this->servicioModel;
    }
}