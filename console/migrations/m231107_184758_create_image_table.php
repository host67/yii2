<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%image}}`.
 */
class m231107_184758_create_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%image}}', [
            'image_id' => $this->primaryKey(),
            'url' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%image}}');
    }
}
