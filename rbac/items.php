<?php
return [
    'AddArticle' => [
        'type' => 2,
    ],
    'AddDebit'=>[
        'type'=>2,
    ],
    'ViewHistory'=>[
        'type'=>2,
    ],
    'AddCredit'=>[
        'type'=>2,
    ],
    'manager' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'AddDebit',
            'AddArticle',
            'AddCredit',
            'ViewHistory',
        ],
    ],
     'admin'=>[
        'type'=>1,
        'ruleName' => 'userGroup',
         'children' => [
             'AddDebit',
             'AddArticle',
             'AddCredit',
             'ViewHistory',
         ],
    ],
    'employee'=>[
        'type'=>1,
        'ruleName' => 'userGroup',
        'children'=>['AddDebit','AddCredit'],
    ]
];
