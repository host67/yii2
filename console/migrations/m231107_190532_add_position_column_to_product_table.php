<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product}}`.
 */
class m231107_190532_add_position_column_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product}}', 'image_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%product}}', 'image_id');
    }
}
