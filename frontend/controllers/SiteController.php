<?php

namespace frontend\controllers;

use cheatsheet\Time;
use common\sitemap\UrlsIterator;
use frontend\models\ContactForm;
use frontend\models\Questions;
use Sitemaped\Element\Urlset\Urlset;
use Sitemaped\Sitemap;
use trntv\filekit\actions\DeleteAction;
use trntv\filekit\actions\UploadAction;
use Yii;
use yii\filters\PageCache;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends BaseController
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
            ],
            'icon-upload' => [
                'class' => UploadAction::class,
                'deleteRoute' => 'icon-delete',
                'on afterSave' => function ($event) {
                    /* @var $file \League\Flysystem\File */
                    $file = $event->file;
                }
            ],
            'icon-delete' => [
                'class' => DeleteAction::class
            ]
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $this->language();
        $model = new \common\models\Questions();

        return $this->render('index', [
                'model' => $model
        ]);
    }

    /**
     * @return string
     */
    public function actionQuestionsend()
    {
        $model = new Questions();

        if (Yii::$app->request->isPost) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $questions = Yii::$app->request->post('Questions');
            $file = $questions['file'];
            $file_path = $file['path'] ?? NULL;
            $file_base_url = $file['base_url'] ?? NULL;

            $model->firstname = Yii::$app->request->post('firstname');
            $model->lastname = Yii::$app->request->post('lastname');
            $model->file = '-';
            $model->file_path = $file_path;
            $model->file_base_url = $file_base_url;
            $model->status = 0;

            if ($model->save()) {
                return [
                    'data' => [
                        'success' => true,
                        'model' => $model,
                        'message' => Yii::t('frontend', 'Your message saved!'),
                    ],
                    'code' => 0,
                ];
            } else {
                return [
                    'data' => [
                        'success' => false,
                        'model' => null,
                        'message' => Yii::t('frontend', 'Your message do not saved!'),
                    ],
                    'code' => 1,
                ];
            }
        }
    }

    /**
     * @return string|Response
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->contact(Yii::$app->params['adminEmail'])) {
                Yii::$app->getSession()->setFlash('alert', [
                    'body' => Yii::t('frontend', 'Thank you for contacting us. We will respond to you as soon as possible.'),
                    'options' => ['class' => 'alert-success']
                ]);
                return $this->refresh();
            }

            Yii::$app->getSession()->setFlash('alert', [
                'body' => \Yii::t('frontend', 'There was an error sending email.'),
                'options' => ['class' => 'alert-danger']
            ]);
        }

        return $this->render('contact', [
            'model' => $model
        ]);
    }

    /**
     * @param string $format
     * @param bool $gzip
     * @return string
     * @throws BadRequestHttpException
     */
    public function actionSitemap($format = Sitemap::FORMAT_XML, $gzip = false)
    {
        $links = new UrlsIterator();
        $sitemap = new Sitemap(new Urlset($links));

        Yii::$app->response->format = Response::FORMAT_RAW;

        if ($gzip === true) {
            Yii::$app->response->headers->add('Content-Encoding', 'gzip');
        }

        if ($format === Sitemap::FORMAT_XML) {
            Yii::$app->response->headers->add('Content-Type', 'application/xml');
            $content = $sitemap->toXmlString($gzip);
        } else if ($format === Sitemap::FORMAT_TXT) {
            Yii::$app->response->headers->add('Content-Type', 'text/plain');
            $content = $sitemap->toTxtString($gzip);
        } else {
            throw new BadRequestHttpException('Unknown format');
        }

        $linksCount = $sitemap->getCount();
        if ($linksCount > 50000) {
            Yii::warning(\sprintf('Sitemap links count is %d', $linksCount));
        }

        return $content;
    }
}
