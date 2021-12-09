<?php

namespace backend\controllers;

use backend\models\Floor;
use backend\models\FloorA;
use backend\models\FloorB;
use backend\models\FloorC;
use backend\models\Apartments;
use backend\models\ApartmentsA;
use backend\models\ApartmentsB;
use backend\models\ApartmentsC;
use backend\models\ApartmentsSearch;
use backend\models\ApartmentsASearch;
use backend\models\ApartmentsBSearch;
use backend\models\ApartmentsCSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ApartmentsController implements the CRUD actions for Apartments model.
 */
class ApartmentsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['GET', 'POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Apartments models.
     * @return mixed
     */
    public function actionIndex($block)
    {
        // $searchModel = new ApartmentsSearch();
        // $dataProvider = $searchModel->search($this->request->queryParams);
        
        if ($block === 'a') {
            // $dataProvider = new ActiveDataProvider([
            //     'query' => ApartmentsA::find(),
            // ]);
            $searchModel = new ApartmentsASearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

        }

        if ($block === 'b') {
            $searchModel = new ApartmentsBSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
        }

        if ($block === 'c') {
            $searchModel = new ApartmentsCSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
        }

        /*$dataProvider = new ActiveDataProvider([
            'query' => ApartmentsA::find(),
            
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            
        ]);*/

        return $this->render('index', compact('searchModel','dataProvider','block'));

    }

    /**
     * Displays a single Apartments model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $block)
    {
        if ($block === 'a') {
            $model = ApartmentsA::find($id)->one();
        }

        if ($block === 'b') {
            $model = ApartmentsB::find($id)->one();
        }

        if ($block === 'c') {
            $model = ApartmentsC::find($id)->one();
        }

        return $this->render('view', compact('model'));
    }

    /**
     * Creates a new Apartments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($block)
    {
        if ($block === 'a') {
            $model = new ApartmentsA();
            $floor = FloorA::find()->all();
        }

        if ($block === 'b') {
            $model = new ApartmentsB();
            $floor = FloorB::find()->all();
        }

        if ($block === 'c') {
            $model = new ApartmentsC();
            $floor = FloorC::find()->all();
        }
        // $model = new Apartments();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                // return $this->redirect(['view', 'id' => $model->id]);
                return $this->redirect(['index', 'block' => $block]);
            }
        } else {
            $model->loadDefaultValues();
        }

        // $floor = Floor::find()->all();

        return $this->render('create', compact('model', 'floor'));
    }

    /**
     * Updates an existing Apartments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $block)
    {
        if ($block === 'a') {
            $model = ApartmentsA::find()->where(['id' => $id])->one();
            $floor = FloorA::find()->all();
        }

        if ($block === 'b') {
            $model = ApartmentsB::find()->where(['id' => $id])->one();
            $floor = FloorB::find()->all();
        }

        if ($block === 'c') {
            $model = ApartmentsC::find()->where(['id' => $id])->one();
            $floor = FloorC::find()->all();
        }

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            // return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index', 'block' => $block]);
        }

        return $this->render('update', compact('model', 'floor'));
    }

    /**
     * Deletes an existing Apartments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $block)
    {
        if ($block === 'a') {
            $model = ApartmentsA::find($id)->one();
        }

        if ($block === 'b') {
            $model = ApartmentsB::find($id)->one();
        }

        if ($block === 'c') {
            $model = ApartmentsC::find($id)->one();
        }

        $model->find($id)->one();
        $model->delete();

        return $this->redirect(['index', 'block' => $block]);
    }

    /**
     * Finds the Apartments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Apartments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Apartments::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
