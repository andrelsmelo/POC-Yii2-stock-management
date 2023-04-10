<?php

use yii\db\Migration;

/**
 * Class m230410_183315_create_table_suppliers
 */
class m230410_183315_create_table_suppliers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable(
            'suppliers',
            [
                'id' => $this->primaryKey(),
                'cnpj' => $this->string(18)->notNull(),
                'razao_social' => $this->string()->notNull(),
                'cep' => $this->string(9)->notNull(),
                'phone' => $this->string(14)->notNull(),
            ]
        );

        $this->batchInsert(
            'suppliers',
            ['cnpj', 'razao_social', 'cep', 'phone'],
            [
                [
                    'cnpj' => '01.234.567/0001-89',
                    'razao_social' => 'Fornecedor 1 LTDA',
                    'cep' => '12345-678',
                    'phone' => '(11) 1234-5678',
                ],
                [
                    'cnpj' => '12.345.678/0001-90',
                    'razao_social' => 'Fornecedor 2 LTDA',
                    'cep' => '23456-789',
                    'phone' => '(11) 2345-6789',
                ],
                [
                    'cnpj' => '23.456.789/0001-91',
                    'razao_social' => 'Fornecedor 3 LTDA',
                    'cep' => '34567-890',
                    'phone' => '(11) 3456-7890',
                ],
                [
                    'cnpj' => '34.567.890/0001-92',
                    'razao_social' => 'Fornecedor 4 LTDA',
                    'cep' => '45678-901',
                    'phone' => '(11) 4567-8901',
                ],
                [
                    'cnpj' => '45.678.901/0001-93',
                    'razao_social' => 'Fornecedor 5 LTDA',
                    'cep' => '56789-012',
                    'phone' => '(11) 5678-9012',
                ],
                [
                    'cnpj' => '56.789.012/0001-94',
                    'razao_social' => 'Fornecedor 6 LTDA',
                    'cep' => '67890-123',
                    'phone' => '(11) 6789-0123',
                ],
                [
                    'cnpj' => '67.890.123/0001-95',
                    'razao_social' => 'Fornecedor 7 LTDA',
                    'cep' => '78901-234',
                    'phone' => '(11) 7890-1234',
                ],
                [
                    'cnpj' => '78.901.234/0001-96',
                    'razao_social' => 'Fornecedor 8 LTDA',
                    'cep' => '89012-345',
                    'phone' => '(11) 8901-2345',
                ],
                [
                    'cnpj' => '89.012.345/0001-97',
                    'razao_social' => 'Fornecedor 9 LTDA',
                    'cep' => '90123-456',
                    'phone' => '(11) 9012-3456',
                ]
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230410_183315_create_table_suppliers cannot be reverted.\n";

        $this->dropTable('suppliers');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230410_183315_create_table_suppliers cannot be reverted.\n";

        return false;
    }
    */
}
