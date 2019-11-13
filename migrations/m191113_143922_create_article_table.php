<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m191113_143922_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'text' => $this->text(),
            'author_id' =>$this->integer(),
            'category_id' => $this->integer(),
            'views' => $this->integer(8),
            'date' => $this->date()
        ]);

        $this->addForeignKey(
            'fk_article_author_id',
            'article',
            'author_id',
            'user',
            'id'
        );
        $this->addForeignKey(
            'fk_article_category_id',
            'article',
            'category_id',
            'category',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk_article_author_id',
            'article'
        );
        $this->dropForeignKey(
            'fk_article_category_id',
            'article'
        );
        $this->dropTable('{{%article}}');
    }
}
