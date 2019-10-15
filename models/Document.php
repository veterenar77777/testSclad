<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "document".
 *
 * @property int $document_id
 * @property int $author_id
 * @property string $doc_type
 * @property int $article_id
 * @property int $amount
 * @property string $created_at
 *
 * @property Article $article
 */
class Document extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'article_id', 'amount'], 'integer'],
            [['doc_type'], 'string'],
            [['created_at'], 'safe'],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'article_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'document_id' => 'Документ №',
            'author_id' => 'Автор',
            'doc_type' => 'Тип документа',
            'article_id' => 'Артикул',
            'amount' => 'Количество',
            'created_at' => 'Дата',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['article_id' => 'article_id']);
    }

    public function getAuthorName(){
        return User::getUserName($this->author_id);
    }
}
