<?php

namespace app\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;



class DocumentSearch extends Model
{

    public $author_id;
    public $doc_type;
    public $article_id;
    public $datetime_range;

    public function rules()
    {
        return [
             [['author_id', 'article_id'], 'integer'],
             [['doc_type','datetime_range'], 'safe'],
             [['datetime_range'], 'match', 'pattern' => '/^.+\s\-\s.+$/']

        ];
    }


    public function search($params)
    {
        $query = Document::find();



        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if(!$this->validate()){
            return $dataProvider;
        }

        if ($this->article_id){
            $query->andFilterWhere([
                'article_id' => Article::find()->select('article_id')->where(['like','name',$this->article_id]),

            ]);
        }
        if ($this->doc_type){
            $query->andFilterWhere(['like', 'doc_type', $this->doc_type]);
        }

        if ($this->author_id){
            $query->andFilterWhere(['author_id'=> $this->author_id]);
        }
        if($this->datetime_range){
            list($data_start,$data_end) = explode(' - ',$this->datetime_range);
            $query->andFilterWhere(['between','created_at',$data_start,$data_end]);
        }


        return $dataProvider;
    }
}