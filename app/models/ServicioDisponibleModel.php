<?php


namespace app\models;


class ServicioDisponibleModel extends ServicioDisponible
{
    private $montoComision;
    private $montoIva;

    /**
     * @return mixed
     */
    public function getMontoComision()
    {
        return $this->montoComision;
    }

    /**
     * @return mixed
     */
    public function getMontoIva()
    {
        return $this->montoIva;
    }

    /**
     * @param $subtotal
     * @return $this
     */
    public function calcularComisionOlimpix($subtotal)
    {
        $comision = (($subtotal * $this->porcentaje_comision_olimpix) / 100) + $this->monto_comision_olimpix;
        $this->montoComision = $comision;
        return $this;
    }

    /**
     * @param $subtotal
     * @return $this\
     */
    public function calcularMontoIva(float $subtotal)
    {
        $porcentajeIva = !empty($this->porcentaje_iva) ? floatval($this->porcentaje_iva) : 0;
        $this->montoIva = ($subtotal * $porcentajeIva) / 100;
        return $this;
    }

    /**
     * @param $parentObj
     * @return ServicioDisponibleModel
     */
    public function loadFromParentObj(ServicioDisponible $parentObj)
    {
        $objValues = $parentObj->attributes; // return array of object values
        foreach ($objValues AS $key => $value) {
            $this->$key = $value;
        }
        return $this;
    }
}