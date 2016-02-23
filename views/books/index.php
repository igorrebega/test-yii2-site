<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\assets\BoostrapMediaLightboxAsset;
use yii\helpers\Url;

BoostrapMediaLightboxAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel app\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать книгу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            [
                'attribute' => 'preview',
                'format' => 'html',
                'value' => function ($model) {
                    $img = Html::img($model->preview, ['height' => 100, 'width' => 100, 'class' => 'img-thumbnail']);
                    return Html::a($img, $model->preview, ['class' => 'lightbox']);
                }
            ],
            [
                'attribute' => 'date',
                'value' => function ($model) {
                    return Yii::$app->formatter->asDate($model->date);
                }
            ],
            [
                'attribute' => 'date_create',
                'value' => function ($model) {
                    return $model->dateText;
                }
            ],
            [
                'attribute'=>'author_id',
                'value'=>function($model){
                    return $model->author->fullName;
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {view} {delete}',
                'buttons'=>[
                    'update'=> function($url,$model){
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',['update','id'=>$model->id],['target'=>'_blank']);
                    },
                    'view' => function($url,$model){
                       return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',null,['onclick'=>'preview("'.Url::to(['/books/view','id'=>$model->id]).'")']);
                    }
                ]
            ]
        ],
    ]); ?>

</div>
<div class="modal fade" tabindex="-1" role="dialog" id="view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
