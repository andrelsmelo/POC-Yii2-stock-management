<?php

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'products';
    }

    public function rules()
    {
        return [
            [['name', 'category_id', 'price', 'supplier_id'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['desc'], 'string'],
            [['category_id', 'supplier_id'], 'integer'],
            [['price'], 'number'],
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function getSupplier()
    {
        return $this->hasOne(Supplier::class, ['id' => 'supplier_id']);
    }

    public function getStock()
    {
        return $this->hasOne(Stock::class, ['product_id' => 'id']);
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

    public static function find()
    {
        return parent::find()->andWhere(['deleted_at' => null]);
    }
}
