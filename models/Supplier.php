<?php

namespace app\models;

use yii\db\ActiveRecord;

class Supplier extends ActiveRecord
{

    public $deleted_at;
    
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
