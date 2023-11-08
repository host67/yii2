<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product}}`.
 */
class m231108_151643_add_position_column_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product}}', 'description', $this->text());
        $this->addColumn('{{%product}}', 'sku', $this->integer());
        $this->addColumn('{{%product}}', 'barcode', $this->string(18));
        $this->addColumn('{{%product}}', 'quantity', $this->integer());
        $this->addColumn('{{%product}}', 'status', $this->integer());
        $this->addColumn('{{%product}}', 'date_added', $this->datetime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%product}}', 'description');
        $this->dropColumn('{{%product}}', 'sku');
        $this->dropColumn('{{%product}}', 'barcode');
        $this->dropColumn('{{%product}}', 'quantity');
        $this->dropColumn('{{%product}}', 'status');
        $this->dropColumn('{{%product}}', 'date_added');
    }
}
