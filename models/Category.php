<?php

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'categories';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function getProducts()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
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
