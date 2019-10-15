<?php
/**
 * Created by PhpStorm.
 * User: plasmo
 * Date: 14.10.2019
 * Time: 23:32
 */
?>

<?= \yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [


        [
            'attribute' => 'document_id',
            'filter' => false,
            'enableSorting' => false,
            'headerOptions' => [
                'class' => 'col-md-2',

            ],
        ],
        [
         'attribute' => 'author_id',
         'filter' =>$users,
          'value'=>'authorName'
        ],
        ['attribute' => 'doc_type',
            'filter' => [
                'debit'=>  'debit',
                'credit'=>'credit',
            ],
        ],
        [
            'attribute' => 'article_id',
            'value' => 'article.name'


        ],
        ['attribute' => 'amount',
            'enableSorting' => false,
            'filter' => false,

        ],
            [
               'attribute' => 'created_at',
               'headerOptions' => [
                   'class' => 'col-md-2',

               ],
               'filter' => \kartik\daterange\DateRangePicker::widget([
                   'model'=>$searchModel,
                   'attribute'=>'datetime_range',
                   'convertFormat'=>true,
                    'pluginOptions'=>[
                       'format'=>'Y-m-d 00:00'
                   ]
               ])
           ]


    ]]); ?>