<?php

namespace app\models;

use yii\web\NotFoundHttpException;

class OrderModel extends Order
{
    /**
     * @param $parentObj
     * @return ServicioDisponibleModel
     */
    public function loadFromParentObj(Order $parentObj)
    {
        $objValues = $parentObj->attributes; // return array of object values
        foreach ($objValues AS $key => $value) {
            $this->$key = $value;
        }
        return $this;
    }

    /**
     * @param $post
     * @return $this
     * @throws NotFoundHttpException
     */
    public function processPostData($post)
    {
        echo '<pre>';
        var_dump($post);
        echo '</pre>';
        //exit;
        $orderStatus = $this->findOrderStatusModel($post['x_cod_response']);
        $this->order_status_id_order_status = $orderStatus->id_order_status;

        return $this;
    }

    /**
     * @param $idStatus
     * @return OrderStatus|null
     * @throws NotFoundHttpException
     */
    private function findOrderStatusModel($idStatus)
    {
        var_dump($idStatus); exit;
        if (($model = OrderStatus::findOne($idStatus)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
