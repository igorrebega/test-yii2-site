<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $name
 * @property integer $date_create
 * @property integer $date_update
 * @property string $preview
 * @property string $date
 * @property integer $author_id
 */
class Books extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','preview','date','author_id'],'required'],
            [['date_create', 'date_update', 'author_id'], 'integer'],
            [['date'], 'date','format'=>'php:Y-m-d'],
            [['name', 'preview'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'date_create' => 'Дата добавления',
            'date_update' => 'Date Update',
            'preview' => 'Превью',
            'date' => 'Дата выхода книги',
            'author_id' => 'Автор',
            'date_from'=>'Дата от',
            'date_to'=>'Дата до',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'date_create',
                'updatedAtAttribute' => 'date_update',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_create', 'date_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date_update'],
                ],
            ],
        ];
    }

    /**
     * Return date_create in user-friendly format
     * @return string
     */
    public function getDateText(){
        $date = date('d/m/Y', $this->date_create);
        if($date == date('d/m/Y')) {
            $date = 'Сегодня';
        }
        else if($date == date('d/m/Y',time() - (24 * 60 * 60))) {
            $date = 'Вчера';
        }
        return $date;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor(){
        return $this->hasOne(Authors::className(),['id'=>'author_id']);
    }
}
