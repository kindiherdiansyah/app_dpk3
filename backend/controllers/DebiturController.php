<?php

namespace backend\controllers;

use Yii;
use app\models\Debitur;
use backend\models\DebiturSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
/**
 * DebiturController implements the CRUD actions for Debitur model.
 */
class DebiturController extends Controller
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
                    'delete-multiple' => ['post'],
                ],
            ],
        ];
    }

    // public function rupiah($angka)
    // {
    // $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    // return $hasil_rupiah;

    // echo rupiah(1000000);
    // }
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
                    $model = new \app\models\Debitur;
                    $model->nodeb = (string)$sheetData[$baseRow]['A'];
                    $model->lao = (string)$sheetData[$baseRow]['B'];
                    $model->nama = (string)$sheetData[$baseRow]['C'];
                    $model->alamat = (string)$sheetData[$baseRow]['D'];
                    $model->angsuran = (string)$sheetData[$baseRow]['E'];
                    $model->tgk_angsuran = (string)$sheetData[$baseRow]['F'];
                    $model->dpd = (string)$sheetData[$baseRow]['G'];
                    $model->bulan = (string)$sheetData[$baseRow]['H'];
                    $model->outstanding = (string)$sheetData[$baseRow]['I'];
                    $model->nama_ptgs = (string)$sheetData[$baseRow]['J'];
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

    public function actionGroup()
    {
        // $query1 = (new \yii\db\Query())
        //             ->select(['lao',new \yii\db\Expression('COUNT(lao)'),'nama_ptgs', new \yii\db\Expression('SUM(outstanding)')])
        //             ->from('debitur')
        //             ->groupBy('lao')
        //             ->all();

        // $query2 = (new \yii\db\Query())
        //             ->select(['lao', new \yii\db\Expression('SUM(tgt_pergeseran)')])
        //             ->from('resume')
        //             ->groupBy('lao')
        //             ->all();
$subQueryFrom = new \yii\db\Query();
$subQueryFrom->select(['lao', 'nama_ptgs',new \yii\db\Expression('SUM(outstanding) as Outstanding, COUNT(lao) as jumlah')])
    ->from('debitur')
    ->groupBy('lao');

$subQueryJoin = new \yii\db\Query();
$subQueryJoin->select(['lao', 'deb', new \yii\db\Expression('SUM(tgt_pergeseran) as Target')])
    ->from('resume')
    ->groupBy('lao');

$subQueryJoin1 = new \yii\db\Query();
$subQueryJoin1->select(['lao', 'deb as deb1', new \yii\db\Expression('SUM(realisasi) as Total')])
    ->from('monitoring')
    ->groupBy('lao');

$query = new \yii\db\Query();

$results = $query->select(['debitur.lao', 'debitur.nama_ptgs', 'debitur.Outstanding', 'debitur.jumlah', 'resume.deb', 'resume.Target','monitoring.deb1', 'monitoring.Total'])
    ->from(['debitur' => $subQueryFrom])
    ->innerJoin(['resume' => $subQueryJoin], 'debitur.lao = resume.lao')
    ->innerJoin(['monitoring' => $subQueryJoin1], 'debitur.lao = monitoring.lao')
    ->all();

        return $this->render('outstanding', [
            // 'query1'=>$query1,
            // 'query2'=>$query2,
            'results'=>$results,

        ]);
    }
    /**
     * Lists all Debitur models.
     * @return mixed
     */

    // public function actionIndex()
    // {
    //     $searchModel = new DebiturSearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    //     $query = (new \yii\db\Query())
    //                 ->select(['lao','nama_ptgs', new \yii\db\Expression('SUM(outstanding)')])
    //                 ->from('debitur')
    //                 ->groupBy('lao')
    //                 ->all();
    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //         'query' => $query,
    //     ]);
    // }

    public function actionIndex()
    {
        $searchModel = new DebiturSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMultipleDelete()
    {
       //echo "actionMultidel"; exit;
        $pk = Yii::$app->request->post('debitur_id');
        foreach ($pk as $key => $value) 
        { 
            $sql = "DELETE FROM debitur WHERE debitur_id = $value";
            $query = Yii::$app->db->createCommand($sql)->execute();
        }
        return $this->redirect(['index']);
    }

    /**
     * Displays a single Debitur model.
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
     * Creates a new Debitur model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Debitur();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->debitur_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Debitur model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->debitur_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Debitur model.
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
     * Finds the Debitur model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Debitur the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Debitur::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
