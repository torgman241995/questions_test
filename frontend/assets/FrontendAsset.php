<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use common\assets\Html5shiv;
use rmrevin\yii\fontawesome\NpmFreeAssetBundle;
use yii\bootstrap4\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Frontend application asset
 */
class FrontendAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@frontend/web/';

    /**
     * @var array
     */
    public $css = [
        'css/bootstrap.min.css',
        'css/paper-kit.css?v=2.2.0',
        'demo/demo.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'js/core/jquery.min.js',
        'js/core/bootstrap.min.js',
        'js/plugins/moment.min.js',
        'js/paper-kit.js?v=2.2.0',
    ];

    /**
     * @var array
     */
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
        Html5shiv::class,
        NpmFreeAssetBundle::class,
    ];
}
