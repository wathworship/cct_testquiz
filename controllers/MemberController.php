<?php

namespace app\controllers;

use Yii;
use app\models\Member;
use app\models\MemberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MemberController implements the CRUD actions for Member model.
 */
class MemberController extends Controller
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
     * Lists all Member models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MemberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->pagination->pageSize=10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Member model.
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
     * Creates a new Member model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Member();

        $model->member_code = $this->getNextId();
        
        $model->userone = Yii::$app->user->identity->username;

        if ($model->load(Yii::$app->request->post())) {
            $model->id_user = Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_member]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public static function getNextId(){ //ตัวอย่างหากต้องการ 2016/0000
        $case = 'MM';
       // $year = substr(date('Y'),0);//หาจากปีปัจจุบับคือ 2016
        $lastRecord = Member::find()->where(['like', 'member_code',$case.'-'])->orderBy(['id_member' => SORT_DESC])->one();//หาตัวล่าสุดก่อน
            if ($lastRecord) {
                $digit = explode('-', $lastRecord->member_code);
                $lastDigit = ((int) $digit[1]); // เปลี่ยน string เป็น integer สำหรับคำนวณ +1
                    $lastDigit++; //เพิ่ม 1
                    $lastDigit = str_pad($lastDigit, 4, '0', STR_PAD_LEFT);//ใส่ 0 ข้างหน้าหน่อย
            } else {
                    $lastDigit = '0001';
                 }
                    return $case . '-' . $lastDigit;
        }

    /**
     * Updates an existing Member model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->userone = $model->user->username;
        if ($model->load(Yii::$app->request->post())) {
            $model->id_user = Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_member]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Member model.
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
     * Finds the Member model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Member the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Member::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
