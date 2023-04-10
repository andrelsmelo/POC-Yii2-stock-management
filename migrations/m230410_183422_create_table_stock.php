<?php

use yii\db\Migration;

/**
 * Class m230410_183422_create_table_stock
 */
class m230410_183422_create_table_stock extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('stock', [
            'product_id' => $this->integer()->notNull(),
            'amount' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->addPrimaryKey('pk-stock', 'stock', ['product_id']);

        $this->addForeignKey(
            'fk-stock-product_id',
            'stock',
            'product_id',
            'products',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->batchInsert('stock', ['product_id', 'amount'], [
            [1, 10],
            [2, 5],
            [3, 20],
            [4, 15],
            [5, 30],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230410_183422_create_table_stock cannot be reverted.\n";

        $this->dropForeignKey('fk-stock-product_id', 'stock');

        $this->dropPrimaryKey('pk-stock', 'stock');

        $this->dropTable('stock');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230410_183422_create_table_stock cannot be reverted.\n";

        return false;
    }
    */
}
