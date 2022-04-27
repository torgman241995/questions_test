<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 */
$this->title = Yii::$app->name;
?>
<div class="section">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
                <h2 class="title"><?php echo Yii::t('frontend', 'Do you have a questions?'); ?></h2>
                <p class="description"><?php echo Yii::t('frontend', 'To ask our experts - fill out the form below'); ?></p>
            </div>
            <div class="col-md-5 ml-auto mr-auto download-area">
                <?php $form = ActiveForm::begin([
                    'action' => ['site/questionsend'],
                    'options' => [
                        'class' => 'question-form'
                    ]]); ?>
                    <div class="form-group">
                        <?php echo $form->field($model, 'firstname')->textInput(['id' => 'firstname_input', 'minlength' => 2, 'maxlength' => 50, 'name' => 'firstname', 'placeholder' => Yii::t('frontend', 'Enter first name'), 'required' => true])->label(Yii::t('frontend', 'First name')) ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->field($model, 'lastname')->textInput(['id' => 'lastname_input', 'minlength' => 2, 'maxlength' => 50, 'name' => 'lastname', 'placeholder' => Yii::t('frontend', 'Enter last name'), 'required' => true])->label(Yii::t('frontend', 'Last name')) ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->field($model, 'file')->widget(\trntv\filekit\widget\Upload::class, [
                            'url'=>['icon-upload'],
                            'maxFileSize' => 2000000,
                        ])->hint(Yii::t('backend', 'Max File size {size}', [
                            'size' => '2 Mb'
                        ])); ?>
                    </div>

                    <?php echo Html::submitButton(Yii::t('common', 'Send question'), ['class' => 'btn btn-primary query-send']) ?>
                    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>