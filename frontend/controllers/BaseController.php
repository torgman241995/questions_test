<?php

namespace frontend\controllers;

use cheatsheet\Time;
use common\sitemap\UrlsIterator;
use frontend\models\ContactForm;
use Sitemaped\Element\Urlset\Urlset;
use Sitemaped\Sitemap;
use Yii;
use yii\filters\PageCache;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class BaseController extends Controller
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => PageCache::class,
                'only' => ['sitemap'],
                'duration' => Time::SECONDS_IN_AN_HOUR,
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
            'set-locale' => [
                'class' => 'common\actions\SetLocaleAction',
                'locales' => array_keys(Yii::$app->params['availableLocales'])
            ]
        ];
    }

    /**
     * @return string
     */
    public function language()
    {
        $url_start = '';
        $request = Yii::$app->request->queryParams;
        if($request['slug']){
            $url_start = '/';
        }
        $data = \Yii::$app->language;
        if($data == 'en-US'){
            $language = 'EN';
            $set_language = 'pl-PL';
            $set_language_code = 'PL';
        }
        if($data == 'pl-PL'){
            $language = 'PL';
            $set_language = 'en-US';
            $set_language_code = 'EN';
        }

        Yii::$app->params['language'] = $language;
        Yii::$app->params['set_language'] = $set_language;
        Yii::$app->params['set_language_code'] = $set_language_code;

    }

}
