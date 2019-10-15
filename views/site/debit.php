<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<h2><?=$label; ?></h2>
<?php
$form = ActiveForm::begin([
    'id' => 'login-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-6\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-2 control-label'],
    ],
]); ?>

<?= $form->field($model, 'article_id')->dropDownList(\yii\helpers\ArrayHelper::map($article,'article_id','name'), [
    'prompt' => 'Выберите артикул...'
] ); ?>
    <?= $form->field($model, 'amount')->textInput([
    'type' => 'number'
])->label('Количество'); ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?=  Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            <?= Html::a('Отмена', Url::to('/'),['class' => 'btn btn-danger']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>