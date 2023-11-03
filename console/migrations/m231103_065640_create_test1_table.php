<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test1}}`.
 */
class m231103_065640_create_test1_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test1}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%test1}}');
    }
}
