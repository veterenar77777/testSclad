<?php

use yii\db\Migration;
use \yii\db\Schema;

/**
 * Class m191014_132825_article
 */
class m191014_132825_article extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('article', [
            'article_id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),

        ]);

        $this->createTable('document', [
            'document_id' => Schema::TYPE_PK,
            'author_id' => $this->integer(),
            'doc_type' => 'ENUM("debit", "credit")',
            'article_id' => $this->integer(),
            'amount' => $this->integer(),
            'created_at' => $this->dateTime()->defaultExpression('Now()')
        ]);

        $this->createIndex(
            'idx-article-name',
            'article',
            'name'
        );

        $this->createIndex(
            'idx-document-author_id',
            'document',
            'author_id'
        );
        $this->createIndex(
            'idx-document-doc_type',
            'document',
            'doc_type'
        );
        $this->createIndex(
            'idx-document-created_at',
            'document',
            'created_at'
        );

        $this->createIndex(
            'idx-document-article_id',
            'document',
            'article_id'
        );
        $this->addForeignKey(
            'fk-document-article_id',
            'document',
            'article_id',
            'article',
            'article_id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('article');
    }


}
