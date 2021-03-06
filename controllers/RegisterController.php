<?php

namespace app\controllers;


use Yii;
use app\models\Register;
use app\models\RegisterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use mPDF;

/**
 * RegisterController implements the CRUD actions for Register model.
 */
class RegisterController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Register models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RegisterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Register model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Register model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Register();

        if ($model->load(Yii::$app->request->post())) {
            
            $model->date_of_birth = date("Y-m-d", strtotime($model['date_of_birth']));
            
            $model->upload_image = UploadedFile::getInstance($model,'upload_image');
            $image_name = $model->first_name.rand(1,4000).'.'.$model->upload_image->extension;
            $image_path ='uploads/userImages/'.$image_name;
            $model->upload_image->saveAs($image_path);
            $model->upload_image = $image_path;
           
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Register model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())){
            $model->date_of_birth = date("Y-m-d", strtotime($model['date_of_birth']));
            $model->upload_image = UploadedFile::getInstance($model,'upload_image');
            $image_name = $model->first_name.rand(1,4000).'.'.$model->upload_image->extension;
            $image_path ='uploads/userImages/'.$image_name;
            $model->upload_image->saveAs($image_path);
            $model->upload_image = $image_path;
           

        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Register model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Register model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Register the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Register::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


   public function actionGenpdf($id)
    {
        $pdf_content = $this->renderPartial('viewpdf', [
            'model' => $this->findModel($id),
        ]);
        $mPDF = new \mPDF\mPDF();
        $mPDF->WriteHTML($pdf_content);
        $mPDF->Output();
        exit;
    }

}
