<?php

/**
 * @var yii\web\View $this
 * @var string $content
 */

use yii\helpers\Html;
\frontend\assets\FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>" />
    <link rel="apple-touch-icon" sizes="76x76" href="/img//apple-icon.png">
    <link rel="icon" type="image/png" href="/img//favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        <?php echo Yii::t('frontend', 'Question Page'); ?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <?php $this->head() ?>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <?php echo Html::csrfMetaTags() ?>
</head>

<body class="index-page sidebar-collapse">
<?php $this->beginBody() ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="300">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand text-black-50" href="#" rel="tooltip" title="Logo" data-placement="bottom">
                <?php echo Yii::t('frontend', 'Test Project'); ?>
            </a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/site/set-locale?locale=<?php echo Yii::$app->params['set_language']; ?>" class="nav-link text-black-50"> <?php echo Yii::$app->params['set_language_code']; ?></a>
                </li>
                <li class="nav-item">
                    <a href="#" target="_blank" class="nav-link text-black-50"><i class="nc-icon nc-book-bookmark"></i> <?php echo Yii::t('frontend', 'Info'); ?></a>
                </li>
                <li class="nav-item">
                    <a href="#" target="_blank" class="btn btn-danger btn-round"><?php echo Yii::t('frontend', 'Upgrade to Pro'); ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="main">
    <?php echo $content ?>
    <footer class="footer footer-black  footer-white ">
        <div class="container">
            <div class="row">
                <!-- Footer -->
            </div>
        </div>
    </footer>
    <!--   Core JS Files   -->
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
