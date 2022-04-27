<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Questions $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="questions-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'file')->widget(\trntv\filekit\widget\Upload::class, [
                    'url'=>['icon-upload'],
                    'maxFileSize' => 2000000,
                    ])->hint(Yii::t('backend', 'Max File size {size}', [
                        'size' => '2 Mb'
                ])); ?>
                <?php echo $form->field($model, 'status')->dropDownList($model::statusData()) ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? Yii::t('common', 'Create') : Yii::t('common', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
