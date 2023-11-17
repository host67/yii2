<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m231117_221700_create_product_table extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}
		$this->createTable('{{%product}}', [
			'id' => $this->primaryKey(),
			'name' => $this->string()->notNull(),
			'description' => $this->text(),
			'price' => $this->double()->notNull(),
			'quantity' => $this->integer(),
			'image_id' => $this->integer(),
			'sku' => $this->integer(),
			'barcode' => $this->string(18),
			'created_at' => $this->datetime(),
			'updated_at' => $this->datetime(),
		], $tableOptions);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('{{%product}}');
	}
}
