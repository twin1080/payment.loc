<?php

namespace app\controllers;

use Yii;
use app\models\Payment;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \DateTime;
use yii\web\ForbiddenHttpException;

/**
 * PaymentController implements the CRUD actions for Payment model.
 */
class PaymentController extends Controller
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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'update', 'create'],
                        'allow' => true,
                        'roles' => ['customer'],
                    ],
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['index', 'view', 'update'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Payment models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->identity->isAdmin())
        {
                     
            $dataProvider = new ActiveDataProvider([
            'query' => Payment::find()]);
        }
        else
        {
               
            $dataProvider = new ActiveDataProvider([
            'query' => Payment::find()->where(['UserID'=>Yii::$app->user->getId()])]);
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    
    /**
     * Displays a single Payment model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        
        if (!Yii::$app->user->identity->isAdmin() && $model->UserID !== Yii::$app->user->getId())
        {
              throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));        
        }
        
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Payment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Payment();
        $model->UserID = Yii::$app->user->getId();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            
            return $this->redirect(['site/index','done'=>true]); 
            
            //return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Payment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if (!Yii::$app->user->identity->isAdmin() && $model->UserID !== Yii::$app->user->getId())
        {
              throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));        
        }
                
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                   
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Payment model.
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
     * Finds the Payment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Payment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Payment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
