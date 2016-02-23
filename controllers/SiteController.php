<?php
/**
 * Created by PhpStorm.
 * User: irebega
 * Date: 23.02.16
 * Time: 14:08
 */

namespace app\controllers;


use yii\base\Controller;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
}