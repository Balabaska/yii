<?php

namespace app\controllers;

use app\models\Course;
use app\models\TeacherCourse;
use Yii;
use app\models\Teacher;
use app\models\User;
use app\models\UserSearch;
use app\models\TeacherSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TeacherController implements the CRUD actions for Teacher model.
 */
class TeacherController extends Controller
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
     * Lists all Teacher models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TeacherSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Teacher model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'teacher' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Teacher model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $teacher = new Teacher();
        /*$user = new User();
        $course = new Course();
        $tc = new TeacherCourse();*/

        if ($teacher->load(Yii::$app->request->post())  /*&& $user->load(Yii::$app->request->post())*/ && $teacher->validate() /*&& $user->validate()
            && $course->load(Yii::$app->request->post()) && $course->validate()*/) {

            /*$user->setPassword($user->password);
            $user->generateAuthKey();

            $searchModel = new UserSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $user->save(false);
            $teacher->fk_u = $user->id;*/

            //$teacher->save(false);

            $transaction = Yii::$app->db->beginTransaction();
            try {

                $teacher->save(false);

                //$tc->fk_T = $teacher->T;
                //$tc->fk_C = $course->C;

                ///$tc->save();
                //$teacher->link('TeacherCourse', $tc); // <-- it creates new record in UserAddress table with ua.user_id = user.id

                $transaction->commit();

            } catch (Exception $e) {

                $transaction->rollBack();

            }

            return $this->redirect(['view', 'id' => $teacher->T]);
        }
        else
            return $this->render('create', [
                'teacher' => $teacher,
                //'user' =>$user,
            ]);
    }

    /**
     * Updates an existing Teacher model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $teacher = $this->findModel($id);
        //$user = User::findOne($teacher->fk_u);

        if ($teacher->load(Yii::$app->request->post()) && $teacher->save() /*&& $user->load(Yii::$app->request->post()) && $user->save()*/) {

            //$user->setPassword($user->password);
            $teacher->save(false);
            //$user->save(false);

            return $this->redirect(['view', 'id' => $teacher->T]);
        }

        return $this->render('update', [
            'teacher' => $teacher,
            //'user' => $user,
        ]);
    }

    /**
     * Deletes an existing Teacher model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        /*$id_ = Teacher::findOne($id)->fk_u;
        Teacher::findOne($id)->delete();
        User::findOne($id_)->delete();*/
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Teacher model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Teacher the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        /*if (($teacher = Teacher::findOne($id)) !== null) {*/
        if (($teacher = Teacher::find()->with('courses')->andWhere(['T'=>$id])->one()) !== null) {
            return $teacher;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /*public function loadModel($id)
    {
        $model=Teacher::model()->findByPk($id);
////добавление начато
        $modelcourse=TeacherCourse::model()->find('fk_T=:fk_T', array(':fk_T'=> $id));
        $model->courses =  $modelcourse->fk_T;
////добавление оконченно
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }*/

}
