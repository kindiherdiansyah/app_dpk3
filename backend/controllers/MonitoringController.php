<?php

namespace backend\controllers;

use Yii;
use app\models\Monitoring;
use backend\models\MonitoringSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MonitoringController implements the CRUD actions for Monitoring model.
 */
class MonitoringController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Monitoring models.
     * @return mixed
     */
    public function actionMultipleDelete()
    {
       //echo "actionMultidel"; exit;
        $pk = Yii::$app->request->post('monitoring_id');
        foreach ($pk as $key => $value) 
        { 
            $sql = "DELETE FROM monitoring WHERE monitoring_id = $value";
            $query = Yii::$app->db->createCommand($sql)->execute();
        }
        return $this->redirect(['index']);
    }

    public function actionImport(){
        $modelImport = new \yii\base\DynamicModel([
                    'fileImport'=>'File Import',
                ]);
        $modelImport->addRule(['fileImport'],'required');
        $modelImport->addRule(['fileImport'],'file',['extensions'=>'ods,xls,xlsx'],['maxSize'=>1024*1024]);
 
        if(Yii::$app->request->post()){
            $modelImport->fileImport = \yii\web\UploadedFile::getInstance($modelImport,'fileImport');
            if($modelImport->fileImport && $modelImport->validate()){
                $inputFileType = \PHPExcel_IOFactory::identify($modelImport->fileImport->tempName);
                $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($modelImport->fileImport->tempName);
                $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                $baseRow = 2;
                while(!empty($sheetData[$baseRow]['A'])){
                    $model = new \app\models\Monitoring;
                    $model->kode_lao = (string)$sheetData[$baseRow]['A'];
                    $model->lao = (string)$sheetData[$baseRow]['B'];
                    $model->tgl = (string)$sheetData[$baseRow]['C'];
                    $model->posisi_awal = (string)$sheetData[$baseRow]['D'];
                    $model->persen = (string)$sheetData[$baseRow]['E'];
                    $model->target_awal = (string)$sheetData[$baseRow]['F'];
                    $model->deb = (string)$sheetData[$baseRow]['G'];
                    $model->selisih_before = (string)$sheetData[$baseRow]['H'];
                    $model->target_dua = (string)$sheetData[$baseRow]['I'];
                    $model->realisasi = (string)$sheetData[$baseRow]['J'];
                    $model->selisih = (string)$sheetData[$baseRow]['K'];
                    $model->save();
                    $baseRow++;
                }
                Yii::$app->getSession()->setFlash('success','Success');
            }else{
                Yii::$app->getSession()->setFlash('error','Error');
            }
        }
 
        return $this->render('import',[
                'modelImport' => $modelImport,
            ]);
    }

    public function actionIndex()
    {
        $searchModel = new MonitoringSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Monitoring model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Monitoring model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Monitoring();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->monitoring_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Monitoring model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->monitoring_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Monitoring model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Monitoring model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Monitoring the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Monitoring::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
