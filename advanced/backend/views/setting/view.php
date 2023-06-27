<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Whzsettings */
?>
<div class="whzsettings-view">
 
    <?= DetailView::widget([
        'model' => $model,
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
