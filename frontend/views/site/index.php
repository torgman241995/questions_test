<?php
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
                <form>
                    <div class="form-group">
                        <label for="first"><?php echo Yii::t('frontend', 'First name'); ?></label>
                        <input type="text" name="firstname" class="form-control" aria-describedby="first" placeholder="<?php echo Yii::t('frontend', 'Enter first name'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="last"><?php echo Yii::t('frontend', 'Last name'); ?></label>
                        <input type="text" name="lastname" class="form-control" aria-describedby="last" placeholder="<?php echo Yii::t('frontend', 'Enter last name'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo Yii::t('frontend', 'Attachment'); ?></label>
                        <input type="file" name="file" id="file" class="form-control" aria-describedby="attach">
                    </div>

                    <button type="submit" class="btn btn-primary"><?php echo Yii::t('frontend', 'Send question'); ?> <i class="fa fa-angle-right"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>