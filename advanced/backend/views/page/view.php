<?php

use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pages */
?>
<div class="pages-view">
 
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
            'parent_id',
            'slug',
            'title',
            'titcontents1',
            'titcontents2',
            'titcontents3',
            'contents1:ntext',
            'contents2:ntext',
            'contents3:ntext',
            'image1',
            'image2',
            'image3',
            'imgtmb',
            'page_order',
            'feature',
            'approve',
        ],
    ]) ?>

</div>
