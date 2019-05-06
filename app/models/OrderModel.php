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
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function processPostData($post)
    {
        $orderStatus = $this->findOrderStatusModel($post['x_cod_response']);
        if( $this->order_status_id_order_status !== $orderStatus->id_order_status) {
            $this->order_status_id_order_status = $orderStatus->id_order_status;
            $this->savePaymentNotification($post);
            $this->setBuyerData($post);
            $this->update();
        }

        return $this;
    }

    /**
     * @param $post
     */
    private function savePaymentNotification($post)
    {
        $paymentNotification = new PaymentNotifications();
        $paymentNotification->body = json_encode($post);
        $paymentNotification->order_id_order = $this->id_order;
        $paymentNotification->timestamp = date('Y-m-d H:i:s');
        $paymentNotification->save();
    }

    /**
     * @param $post
     */
    private function setBuyerData($post)
    {
        //x_customer_name //x_customer_lastname
        //x_customer_email
        //x_customer_phone

        //x_customer_doctype
        //x_customer_document
        //x_customer_country
        //x_customer_city
        //x_customer_address
        //x_customer_ip

        $orderInfo = new OrderInfo();
        $orderInfo->order_id_order = $this->id_order;
        $orderInfo->info_type = 'billing';
        $orderInfo->full_name = $post['x_customer_name'] . ' '. $post['x_customer_lastname'];
        $orderInfo->email = $post['x_customer_email'];
        $orderInfo->phone = $post['x_customer_phone'];
        $orderInfo->doc_type = $post['x_customer_doctype'];
        $orderInfo->document = $post['x_customer_document'];
        $orderInfo->country = $post['x_customer_country'];
        $orderInfo->city = $post['x_customer_city'];
        $orderInfo->address = $post['x_customer_address'];
        $orderInfo->ip = $post['x_customer_ip'];

        $orderInfo->save();
    }

    /**
     * @param $idStatus
     * @return OrderStatus|null
     * @throws NotFoundHttpException
     */
    private function findOrderStatusModel($idStatus)
    {
        if (($model = OrderStatus::findOne($idStatus)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
