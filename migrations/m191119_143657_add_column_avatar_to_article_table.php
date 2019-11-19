<?php

use yii\db\Migration;

/**
 * Class m191119_143657_add_column_avatar_to_article_table
 */
class m191119_143657_add_column_avatar_to_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('article','avatar',$this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('article','avatar');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191119_143657_add_column_avatar_to_article_table cannot be reverted.\n";

        return false;
    }
    */
}
