<?php

use yii\db\Migration;

/**
 * Class m230410_183316_create_table_products
 */
class m230410_183316_create_table_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'desc' => $this->text(),
            'category_id' => $this->integer()->notNull(),
            'price' => $this->decimal(10, 2)->notNull(),
            'supplier_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-products-category_id',
            'products',
            'category_id',
            'categories',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-products-supplier_id',
            'products',
            'supplier_id',
            'suppliers',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $this->insert('products', [
                'name' => $faker->word,
                'desc' => $faker->sentence,
                'category_id' => $faker->numberBetween(1, 5),
                'price' => $faker->randomFloat(2, 10, 1000),
                'supplier_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230410_183316_create_table_products cannot be reverted.\n";

        $this->dropForeignKey('fk-products-supplier_id', 'products');
        $this->dropForeignKey('fk-products-category_id', 'products');

        $this->dropTable('products');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230410_183316_create_table_products cannot be reverted.\n";

        return false;
    }
    */
}
