<?php

/**
 * @var yii\web\View $this
 * @var common\models\Questions $model
 */

$this->title = Yii::t('common', 'Update question:') . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common', 'Update');
?>
<div class="questions-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
