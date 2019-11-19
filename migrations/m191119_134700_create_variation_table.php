<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%variation}}`.
 */
class m191119_134700_create_variation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%variation}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'size' => $this->integer(),
            'product_id' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk_variation_product_id',
            'variation',
            'product_id',
            'product',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk_variation_product_id',
            'variation'
        );
        $this->dropTable('{{%variation}}');
    }
}
