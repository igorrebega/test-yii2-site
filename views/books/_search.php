<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BooksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= $form->errorSummary($model)?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'author_id')->dropDownList(\app\models\Authors::authorsList(),['prompt'=>'Автор']) ?>

        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'name')->textInput(['placeholder'=>'Название книги']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 books">
            Дата выхода книги: <?= Html::activeTextInput($model,'date_from',['class'=>'form-control','placeholder'=>'31/12/2014']);?> до <?= Html::activeTextInput($model,'date_to',['class'=>'form-control','placeholder'=>'31/02/2015']);?>
        </div>
        <div class="col-md-3 text-right">
            <div class="form-group">
                <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<hr>
