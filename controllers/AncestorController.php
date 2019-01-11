<?php

namespace app\controllers;

use Yii;
use app\models\Ancestor;
use app\models\AncestorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;
use app\models\UserSearch;
/**
 * AncestorController implements the CRUD actions for Ancestor model.
 */
class AncestorController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login','logout','create', 'update', 'delete','index','view'],
                'rules' => [
                    [
                        'actions' => ['logout', 'create', 'update', 'delete','index','view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Ancestor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AncestorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ancestor model.
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
     * Creates a new Ancestor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $model = new Ancestor();

        //$user = new User();

        if ($model->load(Yii::$app->request->post())  /*&& $user->load(Yii::$app->request->post())*/ && $model->validate() /*&& $user->validate()*/) {

            /*$user->setPassword($user->password);
            $user->generateAuthKey();

            $searchModel = new UserSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $user->save(false);*/

            //$model->fk_u = $user->id;

            $model->save(false);

            return $this->redirect(['view', 'id' => $model->A]);
        }
        else
            return $this->render('create', [
                'model' => $model,
                //'user' =>$user,
            ]);
    }


    /**
     * Updates an existing Ancestor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //$user = User::findOne($model->fk_u);

        if ($model->load(Yii::$app->request->post()) && $model->save() /*&& $user->load(Yii::$app->request->post()) && $user->save()*/) {

            //$user->setPassword($user->password);
            $model->save(false);
            //$user->save(false);

            return $this->redirect(['view', 'id' => $model->A]);
        }

        return $this->render('update', [
            'model' => $model,
            //'user' => $user,
        ]);
    }

    /**
     * Deletes an existing Ancestor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        /*$id_ = Ancestor::findOne($id)->fk_u;
        Ancestor::findOne($id)->delete();
        User::findOne($id_)->delete();*/
        return $this->redirect(['index']);
    }


    /**
     * Finds the Ancestor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ancestor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ancestor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
