<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception*/

use yii\helpers\Html;
use yii\helpers\Url;
use kriss\calendarSchedule\widgets\FullCalendarWidget;
use kriss\calendarSchedule\widgets\processors\EventProcessor;
use kriss\calendarSchedule\widgets\processors\HeaderToolbarProcessor;
use kriss\calendarSchedule\widgets\processors\LocaleProcessor;
use yii\bootstrap5\Modal;
use kartik\datetime\DateTimePicker;
//$this->title = $name;
//$('#ajaxCrudModal').modal('show').find('.modal-body').load($(this).attr('value'));;
$js = <<<JS
function openModal(url) {
    $.get(url, {}, function (data) {
        $('#ajaxCrudModal').modal('show').find('.modal-body').html(data.content);
        $('#ajaxCrudModal').modal('show').find('.modal-header').html(data.title);
        $('#ajaxCrudModal').modal('show').find('.modal-footer').html(data.footer);
    })
}
JS;
$this->registerJs($js);

$renderBefore = <<<JS
calendar.on('eventClick', function (info) {
    console.log(info)
    if (info.event.url) {
        info.jsEvent.preventDefault();
        openModal(info.event.url);
    }
})
JS;
?>
<div class="site-kalendar">
    echo '<label class="control-label">Event Time</label>';
<?=DateTimePicker::widget([
    'name' => 'dp_1',
    'type' => DateTimePicker::TYPE_INPUT,
    'value' => '23-Feb-1982 10:10',
    'pluginOptions' => [
        'autoclose'=>true,
        'minuteStep' => 3,
        'format' => 'dd-M-yyyy hh:ii'
    ]
]);?>

<?php

echo FullCalendarWidget::widget([
    'calendarRenderBefore' => $renderBefore,
    //'calendarRenderBefore' => "console.log('before', calendar)",
    'calendarRenderAfter' => "console.log('after', calendar)",
    'clientOptions' => [
        // all options from fullCalendar
    ],
    'processors' => [
        // quick solve fullCalendar options
        new LocaleProcessor([
            'locale' => 'id',
        ]),
        new HeaderToolbarProcessor(),
        new EventProcessor([
            // use Array
            'events' => [
                ['title' => 'TESTES test', 'start' => '2023-06-26 11:11:11', 'end' => '2023-06-26 21:11:11','id'=>111,'url'=>Url::to(['site/events'])],
            ],
            // use Ajax
            //'events' => Url::to(['/site/events']),
                 //['site/events','id'=>$id], // see FullCalendarEventsAction
        ]),
    ],
]);

?>
</div>

<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "size" => "modal-xl",
    "title" => '<h4 class="modal-title">Modal title</h4>',
    "footer"=>"",// always need it for jquery plugin
])?>

<?php Modal::end(); ?>