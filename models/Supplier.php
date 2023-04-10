<?php

namespace app\models;

use yii\db\ActiveRecord;

class Supplier extends ActiveRecord
{
    public static function tableName()
    {
        return 'suppliers';
    }

    public function rules()
    {
        return [
            [['cnpj', 'razao_social', 'cep', 'phone'], 'required'],
            [['cnpj'], 'string', 'length' => 18],
            [['razao_social'], 'string', 'max' => 255],
            [['cep'], 'string', 'length' => 8],
            [['phone'], 'string', 'length' => 14],
        ];
    }

    public function getProducts()
    {
        return $this->hasMany(Product::class, ['supplier_id' => 'id']);
    }
}
