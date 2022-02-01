<?php

namespace backend\controllers;

use Yii;
use backend\models\Floor;
use backend\models\FloorA;
use backend\models\FloorB;
use backend\models\FloorC;
use backend\models\ApartmentsA;
use backend\models\ApartmentsB;
use backend\models\ApartmentsC;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FloorController implements the CRUD actions for Floor model.
 */
class FloorController extends Controller
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
                    'class' => VerbFilter::class,
                    'actions' => [
                        'update' => ['get', 'POST'],
                        'delete' => ['get', 'POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Floor models.
     * @return mixed
     */
    public function actionIndex($block)
    {
        if ($block === 'a') {
            $dataProvider = new ActiveDataProvider([
                'query' => FloorA::find(),
            ]);
        }

        if ($block === 'b') {
            $dataProvider = new ActiveDataProvider([
                'query' => FloorB::find(),
            ]);
        }

        if ($block === 'c') {
            $dataProvider = new ActiveDataProvider([
                'query' => FloorC::find(),
            ]);
        }
        
        /*$dataProvider = new ActiveDataProvider([
            'query' => Floor::find(),
            
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            
        ]);*/

        return $this->render('index', compact('dataProvider', 'block'));
    }

    /**
     * Displays a single Floor model.
     * @param int $id ID
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
     * Creates a new Floor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($block)
    {
        if ($block === 'a') {
            $model = new FloorA();
        }

        if ($block === 'b') {
            $model = new FloorB();
        }

        if ($block === 'c') {
            $model = new FloorC();
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index', 'block' => $block]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', compact('model', 'block'));
    }

    /**
     * Updates an existing Floor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $block)
    {

        if ($block === 'a') {
            $model = FloorA::find($id)->one();
        }

        if ($block === 'b') {
            $model = FloorB::find($id)->one();
        }

        if ($block === 'c') {
            $model = FloorC::find($id)->one();
        }

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index', 'block' => $block]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionMulty($id = 1, $block = 'a')
    {

        if ($block === 'a') {
            $model = FloorA::find($id)->one();
            $floor = FloorA::find()->all();
            $fl = $this->request->post("FloorA")["floor"];
            $qqq = ApartmentsA::find()
                    ->where(['floor_num' => $fl])
                    ->one();
        }

        if ($block === 'b') {
            $model = FloorB::find($id)->one();
            $floor = FloorB::find()->all();
            $fl = $this->request->post("FloorB")["floor"];
            $qqq = ApartmentsB::find()
                    ->where(['floor_num' => $fl])
                    ->one();
        }

        if ($block === 'c') {
            $model = FloorC::find($id)->one();
            $floor = FloorC::find()->all();
            $fl = $this->request->post("FloorC")["floor"];
            $qqq = ApartmentsC::find()
                    ->where(['floor_num' => $fl])
                    ->one();
        }

        if ($this->request->isPost) {

            $field = explode(PHP_EOL, $this->request->post('field'));

            if ($this->request->post('category') != 'num') {
                $count = $qqq->num;
            } else {
                $count = (int)$field[0];
            }

            $fl = 0;
            if ($this->request->post('FloorA')) {
                $fl = $this->request->post('FloorA')['floor'];
            }
            if ($this->request->post('FloorB')) {
                $fl = $this->request->post('FloorB')['floor'];
            }
            if ($this->request->post('FloorC')) {
                $fl = $this->request->post('FloorC')['floor'];
            }

            $category = $this->request->post('category');

            $text = $fl . '||';
            for ($i=0; $i < count($field); $i++) { 
                // var_dump((int)$field[$i]);
                // issetModel($count, $block);

                
                $mod = $this->issetModel($count, $block);
                // var_dump('<pre>');
                // var_dump($mod);
                // var_dump('</pre>');
                
                
                
                $mod->floor_num = $fl;
                $expression = $field[$i];
                if ($this->request->post('quotes')) {
                    $expression = str_replace('"', '', $expression);
                    $expression = trim($expression);
                }
                if ($this->request->post('comma')) {
                    $expression =  substr($expression, 0, strpos($expression, ','));
                }
                if ($this->request->post('float')) {
                    $expression = str_replace(',', '.', $expression); 
                    $expression = floatval($expression);
                }
                if ($this->request->post('int')) {
                    $expression = trim($expression);
                    if (strcasecmp($expression, 'sold') == 0) {
                        $expression = 2;
                    }
                    $expression = preg_replace("/[^0-9]/", '', $expression);
                    $expression = intval($expression);
                }
                if ($this->request->post('price')) {
                    $expression = substr($expression, 0, strpos($expression, ','));
                    $expression = str_replace('$', '', $expression); 
                    $expression = str_replace(' ', '', $expression); 
                    $expression = preg_replace("/[^0-9]/", '', $expression);
                    $expression = intval($expression);
                }
                if ($this->request->post('view')) {

                    if (strcasecmp(trim($expression), 'mountain view')) {
                        $mod->ru = 'горы';
                        $mod->ge = 'მთები';
                        $mod->en = 'mountain';
                        $mod->he = 'ההרים';
                        $text = $text . ', Горы';
                    }
                    if (strcasecmp(trim($expression), 'sea view')) {
                        $mod->ru = 'море';
                        $mod->ge = 'ზღვის';
                        $mod->en = 'sea';
                        $mod->he = 'יָם';
                        $text = $text . ', Море';
                    }

                    $mod->save();
                } else {
                    $mod->$category = $expression;
                    $mod->save();
                    $text = $text . ', ' . $expression;
                }
                

                $mod->save();
                $text = $text . ', ' . $expression;
                // var_dump($expression);
                
                // die;
                
                $count++;
                if ($mod->getErrors()) {
                    var_dump($mod->getErrors());
                }



            }
            // die;
            if ($mod->getErrors()) {
                die;
            }
            Yii::$app->session->setFlash('success', $text);
            // die;
            // return $this->refresh();
            // return $this->redirect(['index', 'block' => $block]);
        }

        return $this->render('multy', compact('model', 'block', 'floor'));
    }

    protected function issetModel($count, $block)
    {
        if ($block === 'a') {
            if (($model = ApartmentsA::find()->where(['num' => $count])->one()) !== null) {
                var_dump('a');
                
                return $model;
            }
            var_dump('ne a' . $count);
            
            return $model = new ApartmentsA();
        }

        if ($block === 'b') {
            if (($model = ApartmentsB::find()->where(['num' => $count])->one()) !== null) {
                return $model;
            }
            return $model = new ApartmentsB();
        }

        if ($block === 'c') {
            if (($model = ApartmentsC::find()->where(['num' => $count])->one()) !== null) {
                return $model;
            }
            return $model = new ApartmentsC();
        }
        
    }

    /**
     * Deletes an existing Floor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $block)
    {
        if ($block === 'a') {
            $model = FloorA::find($id)->one();
        }

        if ($block === 'b') {
            $model = FloorB::find($id)->one();
        }

        if ($block === 'c') {
            $model = FloorC::find($id)->one();
        }

        $model->find($id)->one();
        $model->delete();

        return $this->redirect(['index', 'block' => $block]);
    }

    /**
     * Finds the Floor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Floor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Floor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
