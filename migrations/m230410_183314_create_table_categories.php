<?php

use yii\db\Migration;

/**
 * Class m230410_183314_create_table_categories
 */
class m230410_183314_create_table_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp()->null(),
        ]);

        $this->batchInsert('categories', ['name'], [
            ['Category 1'],
            ['Category 2'],
            ['Category 3'],
            ['Category 4'],
            ['Category 5'],
            ['Category 6'],
            ['Category 7'],
            ['Category 8'],
            ['Category 9'],
            ['Category 10'],
            ['Category 11'],
            ['Category 12'],
            ['Category 13'],
            ['Category 14'],
            ['Category 15'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('categories');

        echo "m230410_183314_create_table_categories cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230410_183314_create_table_categories cannot be reverted.\n";

        return false;
    }
    */
}
