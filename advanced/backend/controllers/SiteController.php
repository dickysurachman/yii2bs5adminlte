<?php

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\bootstrap5\Html;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error','graph','calendar','events','dataimport'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDataimport(){
         $model = new \yii\base\DynamicModel([
            'name', 'email', 'address','satu','dua','tiga','empat','lima','enam','tujuh','lapan','sembilan','puluh','belas'
        ]);
        $model->addRule(['name','email'], 'required')
        ->addRule(['email'], 'email')
        ->addRule('address', 'string',['max'=>32]);
        $modelImport = new \yii\base\DynamicModel([
                    'fileImport'=>'File Import',
                ]);
        //$modelImport->addRule(['fileImport'],'required');
        //$modelImport->addRule(['fileImport'],'file',['extensions'=>'ods,xls,xlsx'],['maxSize'=>1024*1024]);

        if(Yii::$app->request->post()){
            $modelImport->fileImport = \yii\web\UploadedFile::getInstance($modelImport,'fileImport');
            if($modelImport->fileImport && $modelImport->validate()){
                $uploadedFile = \yii\web\UploadedFile::getInstance($modelImport,'fileImport');
                $inputFileType = 'Xlsx';
                $sheetname ="Sheet1";
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                $reader->setLoadSheetsOnly($sheetname);                 
                $spreadsheet = $reader->load($uploadedFile->tempName);
                $worksheet = $spreadsheet->getActiveSheet();
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
                $baseRow=1;  
                //var_dump($worksheet);
                
                for ($row = 2; $row <= $highestRow; ++$row) { 
                    
                    echo (string)$worksheet->getCellByColumnAndRow(3, $row)->getValue();//."<br/>";
                    /*$model = $this->findModel(intval($worksheet->getCellByColumnAndRow(1, $row)->getValue()));
                    if(isset($model)){
                    //$model =  new Barang();
                    $model->nama = (string)$worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $model->harga_jual = intval($worksheet->getCellByColumnAndRow(3, $row)->getValue());
                    $model->harga_beli = intval($worksheet->getCellByColumnAndRow(4, $row)->getValue());
                    $model->save();
                    }*/
                    $baseRow++;                 
                 }
                die();
                Yii::$app->getSession()->setFlash('success',$baseRow.' data has been imported');
            }else{
                Yii::$app->getSession()->setFlash('error','Error');
            }
        }

        return $this->render('import',[
                'modelImport' => $modelImport,
            ]);
    }



    public function actionEvents($start=NULL,$end=NULL,$_=NULL)
    {
      //$this->layout=false;
      $request = Yii::$app->request;
      if($request->isAjax){
        //Yii::$app->response->format = Response::FORMAT_HTML;
        //return $this->renderAjax('event_detail');
        Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> 'Whzsettings ',
                    'content'=>$this->renderAjax('event_detail'),
                    'footer'=> Html::button('Close',['class'=>'btn btn-secondary float-left','data-bs-dismiss'=>'modal'])
                ];
        }    
        else {
        return $this->render('event_detail'); // views/event_detail.php    

        }



      //Yii::$app->response->format = Response::FORMAT_HTML;
      //return $this->render('index'); // views/event_detail.php    

/*    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $events = array();
    $events []=['title' => 'TESTES test', 'start' => '2023-06-26 11:11:11', 'end' => '2023-06-26 21:11:11','id'=>111,'url'=>'https://www.google.com','target'=>"_blank"];
    /*$times = \app\modules\timetrack\models\Timetable::find()->where(array('category'=>\app\modules\timetrack\models\Timetable::CAT_TIMETRACK))->all();

    $events = array();

    foreach ($times AS $time){
      //Testing
      $Event = new \yii2fullcalendar\models\Event();
      $Event->id = $time->id;
      $Event->title = $time->categoryAsString;
      $Event->start = date('Y-m-d\TH:i:s\Z',strtotime($time->date_start.' '.$time->time_start));
      $Event->end = date('Y-m-d\TH:i:s\Z',strtotime($time->date_end.' '.$time->time_end));
      $events[] = $Event;
    }*/

  //  return $events;
    }

     public function actionCalendar()
    {
        // code...

         return $this->render('kalendar');

    }

    public function actionGraph()
    {
        $this->layout="main2";
        Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapPluginAsset']=
                    [
                        'js'=>[]
                    ];
        Yii::$app->assetManager->bundles['yii\web\JqueryAsset']=
                    [
                        'js'=>[]
                    ];
        Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapPluginAsset']=
                    [
                        'js'=>[]
                    ];
        Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset']=
                    [
                        'css'=>[]
                    ];
        //Yii::app()->clientScript->scriptMap['jquery.js'] = false;
        //Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
        return $this->render('grap');
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
