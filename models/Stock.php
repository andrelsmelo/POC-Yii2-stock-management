<?php

namespace app\models;

use yii\db\ActiveRecord;

class Stock extends ActiveRecord
{

    public $deleted_at;

    public static function tableName()
    {
        return 'stock';
    }

    public function rules()
    {
        return [
            [['product_id', 'amount'], 'required'],
            [['product_id', 'amount'], 'integer'],
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    public static function find()
    {
        return parent::find()->joinWith('product');
    }

    public function softDelete()
    {
        $this->deleted_at = date('Y-m-d H:i:s');
        return $this->save(false, ['deleted_at']);
    }

    public function delete()
    {
        $this->softDelete();
        return true;
    }
}
