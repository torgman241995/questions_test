<?php

/**
 * @var yii\web\View $this
 * @var common\models\Questions $model
 */

$this->title = Yii::t('common', 'Create {modelClass}', [
    'modelClass' => 'Questions',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questions-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
