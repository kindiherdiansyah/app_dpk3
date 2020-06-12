<?php

namespace backend\controllers;

use Yii;
use app\models\Resumes;
use backend\models\ResumesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * ResumesController implements the CRUD actions for Resumes model.
 */
class ResumesController extends Controller
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
                    $model = new \app\models\Resumes;
                    $model->lao = (string)$sheetData[$baseRow]['A'];
                    $model->eom = (string)$sheetData[$baseRow]['B'];
                    $model->jml_debitur = (string)$sheetData[$baseRow]['C'];
                    $model->tgt_perpetugas = (string)$sheetData[$baseRow]['D'];
                    $model->tgt_pergeseran = (string)$sheetData[$baseRow]['E'];
                    $model->persen = (string)$sheetData[$baseRow]['F'];
                    $model->tgl = (string)$sheetData[$baseRow]['G'];
                    $model->gap = (string)$sheetData[$baseRow]['H'];
                    $model->gap_baru = (string)$sheetData[$baseRow]['I'];
                    $model->pergeseran = (string)$sheetData[$baseRow]['J'];
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

    public function actionMultipleDelete()
    {
       //echo "actionMultidel"; exit;
        $pk = Yii::$app->request->post('resumes_id');
        foreach ($pk as $key => $value) 
        { 
            $sql = "DELETE FROM resumes WHERE resumes_id = $value";
            $query = Yii::$app->db->createCommand($sql)->execute();
        }
        return $this->redirect(['index']);
    }

    /**
     * Lists all Resumes models.
     * @return mixed
     */

    public function actionIndex()
    {
        $searchModel = new ResumesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Resumes model.
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
     * Creates a new Resumes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Resumes();
        // $model->tgl = date('Y-m-d');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->resumes_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Resumes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionGetPersenEom($laoId)
    {
        $resume = Resumes::findOne($laoId);
        echo Json::encode($resume);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->resumes_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Resumes model.
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
     * Finds the Resumes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Resumes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Resumes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
