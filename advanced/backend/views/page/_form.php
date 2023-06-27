<?php
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model app\models\Pages */
/* @var $form yii\bootstrap5\ActiveForm */
?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'titcontents1')->textInput(['maxlength' => true]) ?>

  <?=$form->field($model, 'contents1')->widget(CKEditor::className(), [
    //'kcfinder' => true,
    'clientOptions'=>[
         'filebrowserBrowseUrl' => yii\helpers\Url::to(['elfinder/ckeditor']),
        'filebrowserImageBrowseUrl' => yii\helpers\Url::to(['elfinder/ckeditor', 'filter' => 'image'])
    ],
    ]);?>

    <?= $form->field($model, 'page_order')->textInput(['maxlength' => true]) ?>

    

    <?= $form->field($model, 'approve')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
