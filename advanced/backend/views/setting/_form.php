<?php
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Whzsettings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="whzsettings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'site_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'site_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'css_style')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'header_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'site_language')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datagrid_css_style')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menu_style')->dropDownList([ 'left' => 'Left', 'top' => 'Top', ], ['prompt' => '']) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
