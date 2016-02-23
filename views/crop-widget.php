<?php
/**
 * @var \yii\db\ActiveRecord $model
 * @var \budyaga\cropper\Widget $widget
 *
 */

use yii\helpers\Html;

?>

<div class="cropper_widget">
    <?= Html::activeHiddenInput($model, $widget->attribute, ['class' => 'photo_field']); ?>
    <?= Html::img(
        ($model->{$widget->attribute} != '') ? $model->{$widget->attribute} : $widget->noPhotoImage,
        ['style' => 'height: ' . $widget->height . 'px; width: ' . $widget->width . 'px', 'class' => 'thumbnail', 'data-no-photo' => $widget->noPhotoImage]
    ); ?>

    <div class="new_photo_area" style="height: <?= $widget->cropAreaHeight; ?>px; width: <?= $widget->cropAreaWidth; ?>px;">
        <div class="cropper_label">
            <span><?= $widget->label;?></span>
        </div>
    </div>
    <div class="progress hidden" style="width: <?= $widget->cropAreaWidth; ?>px;">
        <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" style="width: 0%">
            <span class="sr-only"></span>
        </div>
    </div>
    <div class="cropper_buttons hidden">
        <button type="button" class="btn btn-success crop_photo btn-sm" aria-label="Обрезать фото">
            <span class="glyphicon glyphicon-scissors" aria-hidden="true"></span> Обрезать фото
        </button>
        <button type="button" class="btn btn-info upload_new_photo btn-sm aria-label="Загрузить другое фото">
        <span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Загрузить другое фото
        </button>
    </div>
</div>