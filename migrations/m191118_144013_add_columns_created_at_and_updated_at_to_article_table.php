<?php

use yii\db\Migration;

/**
 * Class m191118_144013_add_columns_created_at_and_updated_at_to_article_table
 */
class m191118_144013_add_columns_created_at_and_updated_at_to_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            'article',
            'created_at',
            $this->integer()
        );
        $this->addColumn(
            'article',
            'created_date_time',
            $this->dateTime()
        );

        $this->addColumn(
            'article',
            'updated_at',
            $this->integer());
        $this->addColumn(
            'article',
            'updated_date_time',
            $this->dateTime());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(
            'article',
            'created_at'
        );
        $this->dropColumn(
            'article',
            'created_date_time'
        );
        $this->dropColumn(
            'article',
            'updated_at'
        );
        $this->dropColumn(
            'article',
            'updated_date_time'
        );
    }

}
