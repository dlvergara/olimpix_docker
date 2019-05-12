<?php
namespace app\widgets;

class Util
{
    /**
     * @param \DateTime $date
     * @return mixed
     */
    public static function DayName(\DateTime $date)
    {
        $day = $date->format('w');
        $days = array('Domingo', 'Lunes', 'Martes', 'Miercoles','Jueves','Viernes', 'Sabado');
        return $days[$day];
    }

    /**
     * @param \DateTime $date
     * @return mixed
     */
    public static function DayMonth(\DateTime $date)
    {
        $month = $date->format('m');
        $months = array('', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
        return $months[intval($month)];
    }
}