<?php
use yii\helpers\Url;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
use kartik\grid\GridView;
use denkorolkov\ajaxcrud\CrudAsset;
use denkorolkov\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WhzsettingsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Whzsettings';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="whzsettings-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="fas fa-plus"></i>', ['create'],
                    ['role'=>'modal-remote','title'=>'Create new Whzsettings','class'=>'btn btn-secondary']).
                    Html::a('<i class="fas fa-redo"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-secondary', 'title'=>'Reset Grid']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'primary',
                'heading' => '<i class="fas fa-list-alt"></i> '.'Whzsettings listing',
                'before'=>'<em>'.'* Resize table columns just like a spreadsheet by dragging the column edges.'.'</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttonText'=>'<span class="fas fa-arrow-right"></span>&nbsp;&nbsp;'.'With selected'.'&nbsp;&nbsp;',
                            'buttons'=>Html::a('<i class="fas fa-trash"></i>&nbsp;'.'Delete All',
                                ["bulkdelete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Are you sure?',
                                    'data-confirm-message'=>'Are you sure want to delete this item'                                ]),
                        ]),
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "title" => '<h4 class="modal-title">Modal title</h4>',
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>