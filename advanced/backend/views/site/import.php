<?php 
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
?>
<h1>Import Update Data Barang</h1>

<?= Html::a('CONTOH TEMPLATE DATA', 'updatebarang.xlsx', ['class' => 'btn btn-success']) ?>
<br/>
<br/>
<br/>
<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]);?>

<?= $form->field($modelImport,'fileImport')->fileInput() ?>

<?= Html::submitButton('Import',['class'=>'btn btn-primary']);?>

<?php ActiveForm::end();?>