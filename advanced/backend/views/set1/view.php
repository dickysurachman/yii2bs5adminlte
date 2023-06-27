<?php

use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Whzsettings */
?>
<div class="whzsettings-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'panel'=>[
        'heading'=>'View # ' . $model->id,
        'type'=>DetailView::TYPE_INFO,
        ],
        'attributes' => [
            'id',
            'site_name',
            'site_address',
            'css_style',
            'header_text',
            'site_language',
            'datagrid_css_style',
            'menu_style',
        ],
    ]) ?>

</div>
