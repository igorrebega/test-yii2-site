<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "authors".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 *
 * @property string $fullName
 */
class Authors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
        ];
    }

    /**
     * Get all authors for drop list
     * @return array
     */
    public static function authorsList(){
        $model = self::find()->all();
        return ArrayHelper::map($model,'id','fullName');
    }

    /**
     * Get author full name
     * @return string
     */
    public function getFullName(){
        return $this->firstname.' '.$this->lastname;
    }
}
