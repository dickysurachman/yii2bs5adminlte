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
//$this->title = $name;

$js = <<<JS


function openModal(url) {
    $.get(url, {}, function (data) {
        $('#ajaxCrudModal').modal('show').find('.modal-body').html(data);
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

<?php

echo time();
echo "<br/>".time() + 10 * 3600;
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