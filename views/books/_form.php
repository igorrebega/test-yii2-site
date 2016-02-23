<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Authors;
use app\components\CropWidget;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preview')->widget(CropWidget::className(), [
        'uploadUrl' => Url::toRoute('/books/uploadPhoto'),
    ]) ?>

    <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'author_id')->dropDownList(Authors::authorsList()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
