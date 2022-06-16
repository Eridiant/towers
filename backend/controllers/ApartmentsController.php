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
use yii\filters\AccessControl;

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
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@']
                        ],
    
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::class,
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
    // https://docs.google.com/spreadsheets/d/1cOh7Q3F5-ac-HZ2BaGXs4fWV66EFAQQ7xt52FjB9F8s/edit#gid=1115666623ss
    // https://docs.google.com/spreadsheets/d/1eGLzNYOQlgtJegIYCZiJdjKFEeo6TKVe/edit?usp=sharing&ouid=113392952037975246587&rtpof=true&sd=true
    // 1резерв 2 продано
    //https://docs.google.com/spreadsheets/d/1971q5sSDF_PuSLbNXI_yp7cY3WJBcwny/edit?usp=sharing&ouid=113392952037975246587&rtpof=true&sd=true
    // https://docs.google.com/spreadsheets/d/1lVuXsIfgm7etJojw4YE1-wuiwdb2c2aj/edit?usp=sharing&ouid=102071057558095013478&rtpof=true&sd=true
    // 1-reserv 2 sold
    public function actionDba()
    {
        $id = '16EzcWloeyDn8zAAolIyU3vCpsYfuOaNR';
        $list = 0;
        $csv = file_get_contents("https://docs.google.com/spreadsheets/d/$id/export?format=csv");
        $csv = explode(PHP_EOL, $csv);
        $arr = array_map('str_getcsv', $csv);
        // var_dump('<pre>');
        // var_dump($arr);
        // var_dump('</pre>');
        // die;
        foreach ($arr as $key => $value) {
            // var_dump('<pre>');
            // var_dump($value[0]);
            // var_dump(strripos($value[0], 'აპარტამენტი') !== false);
            // var_dump('</pre>');
            if (strripos($value[0], 'აპარტამენტი') !== false) {
            // if (false) {
                // var_dump('<pre>');
                // var_dump($value[7]);
                // var_dump(intval(preg_replace('/[^0-9]/', '', $value[0])));
                
                // // var_dump(!strcasecmp(trim($value[6]), 'mountain view'));
                // // var_dump(!strcasecmp(trim($value[8]), 'sea view'));
                // var_dump('</pre>');
                if (true) {
                    $d = intval(preg_replace('/[^0-9]/', '', $value[0]));
                    if ($value[7] == 1) {

                        $q = ApartmentsA::find()
                            ->where(['num' => $d])
                            ->one();
                        $q->status = 1;
                        var_dump('| id=' . $value[0] . '_st=1');
                        $q->save();
                    } elseif ($value[7] == 2) {
                        $q = ApartmentsA::find()
                                ->where(['num' => $d])
                                ->one();
                        $q->status = 2;
                        var_dump('| id=' . $value[0] . '_st=2');
                        $q->save();
                    }  elseif ($d != 0 ) {
                        $q = ApartmentsA::find()
                                ->where(['num' => $d])
                                ->one();

                        $q->status = 0;
                        var_dump('| id=' . $value[0] . '_st=0');
                        // var_dump('| id=' . $d);
                        $q->save();
                    }
                    
                }
                if (false) {
                    $d = intval(preg_replace('/[^0-9]/', '', $value[0]));

                    $q = ApartmentsA::find()
                            ->where(['num' => $d])
                            ->one();

                    $q->money = $this->numint($value[8]);
                    $q->money_m = $this->numint($value[7]);

                    $q->balcony_area = $this->numfl($value[2]);
                    $q->living_space = $this->numfl($value[1]);
                    $q->total_area = $this->numfl($value[3]);

                    if (!strcasecmp(trim($value[6]), 'mountain view')) {
                        $q->ru = 'горы';
                        $q->ge = 'მთები';
                        $q->en = 'mountain';
                        $q->he = 'ההרים';
                    }
                    if (!strcasecmp(trim($value[6]), 'sea view')) {
                        $q->ru = 'море';
                        $q->ge = 'ზღვის';
                        $q->en = 'sea';
                        $q->he = 'יָם';
                    }

                    $q->save();
                }
                
            }
        }die;
    }

    // https://docs.google.com/spreadsheets/d/15jqz5NC8l40MfnMDrdMOg-sU4go1E61N/edit?usp=sharing&ouid=113392952037975246587&rtpof=true&sd=true
    //https://docs.google.com/spreadsheets/d/1JJ35GMQTHEbPOX9NF4LlrHVrmjy9TuaJ/edit?usp=sharing&ouid=113392952037975246587&rtpof=true&sd=true
    // https://docs.google.com/spreadsheets/d/1GE_nUVUKljaEQj_1yq26P63wzY5hy5ET/edit?usp=sharing&ouid=102071057558095013478&rtpof=true&sd=true
    public function actionDbb()
    {
        $id = '1oPSoKuW11iWvctomdEv6GViskrJISLM6';
        $list = 0;
        $csv = file_get_contents("https://docs.google.com/spreadsheets/d/$id/export?format=csv");
        $csv = explode(PHP_EOL, $csv);
        $arr = array_map('str_getcsv', $csv);
        // var_dump('<pre>');
        // var_dump($arr);
        // var_dump('</pre>');
        // die;
        foreach ($arr as $key => $value) {
            // var_dump('<pre>');
            // var_dump($value[0]);
            // var_dump('</pre>');
            if (intval($value[0])) {
                // var_dump('<pre>');
                // var_dump($value);
                // var_dump(!strcasecmp(trim($value[8]), 'sea view'));
                // var_dump('</pre>');
                if (true) {
                    if ($value[9] == 1) {

                        $q = ApartmentsB::find()
                            ->where(['id' => $value[0]])
                            ->one();
                        $q->status = 1;
                        var_dump('| id=' . $value[0] . '_st=1');
                        $q->save();
                    } elseif ($value[9] == 2) {

                        $q = ApartmentsB::find()
                                ->where(['id' => $value[0]])
                                ->one();
                        $q->status = 2;
                        var_dump('| id=' . $value[0] . '_st=2');
                        $q->save();
                    } else {

                        $q = ApartmentsB::find()
                                ->where(['id' => $value[0]])
                                ->one();
                        $q->status = 0;
                        var_dump('| id=' . $value[0] . '_st=0');
                        $q->save();
                    }
                    
                }
                if (false) {
                    $q = ApartmentsB::find()
                            ->where(['id' => $value[0]])
                            ->one();
                            
                    $q->money = $this->numint($value[13]);
                    $q->money_m = $this->numint($value[12]);
                    $q->money_wh = $this->numint($value[11]);
                    $q->money_wh_m = $this->numint($value[10]);

                    $q->balcony_area = $this->numfl($value[2]);
                    $q->living_space = $this->numfl($value[1]);
                    $q->total_area = $this->numfl($value[3]);

                    if (!strcasecmp(trim($value[8]), 'mountain view')) {
                        $q->ru = 'горы';
                        $q->ge = 'მთები';
                        $q->en = 'mountain';
                        $q->he = 'ההרים';
                    }
                    if (!strcasecmp(trim($value[8]), 'sea view')) {
                        $q->ru = 'море';
                        $q->ge = 'ზღვის';
                        $q->en = 'sea';
                        $q->he = 'יָם';
                    }

                    $q->save();
                }

            }
        }
    }

    public function numint($num)
    {

        $num = substr($num, 0, strpos($num, ','));
        $num = str_replace(['$', ' '], '', $num);
        $num = preg_replace("/[^0-9]/", '', $num);
        $num = intval($num);
        return $num;
    }
    public function numfl($num)
    {
        $num = str_replace(',', '.', $num); 
        $num = floatval($num);
        return $num;
    }

    // public function actionDbch19()
    // {
    //     $floor = 0;
    //     $j = 1;
    //     for ($i=3; $i < 45; $i++) {

    //         $floor = ApartmentsB::find()
    //                     ->where(['floor_num' => $i])
    //                     ->one();

    //         $id = $floor->id+18;

    //         $flat = ApartmentsB::find()
    //                     ->where(['id' => $id])
    //                     ->one();

    //         if ($flat->total_area > 40) {
    //             $flat->img = 34;
    //             $flat->save();
    //             if ($flat->getErrors()) {
    //                 var_dump($flat->getErrors());
    //             }
    //         }
    //     }
        
    // }

    // public function actionDbch1()
    // {
    //     $floor = 0;
    //     $j = 1;
    //     for ($i=2; $i < 45; $i++) {

    //         $floor = ApartmentsB::find()
    //                     ->where(['floor_num' => $i])
    //                     ->one();

    //         $id = $floor->id;

    //         $flat = ApartmentsB::find()
    //                     ->where(['id' => $id])
    //                     ->one();
    //         $flat->img = 33;
    //         $flat->save();
    //         if ($flat->getErrors()) {
    //             var_dump($flat->getErrors());
    //         }
    //     }
        
    // }

    // public function actionDbch2()
    // {
    //     $floor = 0;
    //     $j = 1;
    //     for ($i=2; $i < 45; $i++) {

    //         $floor = ApartmentsB::find()
    //                     ->where(['floor_num' => $i])
    //                     ->one();

    //         $id = $floor->id+1;

    //         $flat = ApartmentsB::find()
    //                     ->where(['id' => $id])
    //                     ->one();
    //         $flat->img = 32;
    //         $flat->save();
    //         if ($flat->getErrors()) {
    //             var_dump($flat->getErrors());
    //         }
    //     }
        
    // }

    public function actionDbch3()
    {
        $floor = 0;
        $j = 1;
        for ($i=2; $i < 44; $i++) {

            $floor = ApartmentsB::find()
                        ->where(['floor_num' => $i])
                        ->one();

            $id = $floor->id+1;

            $flat = ApartmentsB::find()
                        ->where(['id' => $id])
                        ->one();
            $flat->img = 25;
            $flat->save();
            if ($flat->getErrors()) {
                var_dump($flat->getErrors());
            }
        }
        
    }

    public function actionDbch20()
    {
        $floor = 0;
        $j = 1;
        for ($i=4; $i < 43; $i++) {
            $floor = ApartmentsB::find()
                        ->where(['floor_num' => $i])
                        ->all();

            $id = end($floor)->id-5;

            $flat = ApartmentsB::find()
                        ->where(['id' => $id])
                        ->one();

            $flat->img = 25;
            $flat->save();
            if ($flat->getErrors()) {
                var_dump($flat->getErrors());
            }
        }
        
    }

    // public function actionDbch21()
    // {
    //     $floor = 0;
    //     $j = 1;
    //     for ($i=4; $i < 45; $i++) {
    //         $floor = ApartmentsB::find()
    //                     ->where(['floor_num' => $i])
    //                     ->all();

    //         $id = end($floor)->id-5;

    //         $flat = ApartmentsB::find()
    //                     ->where(['id' => $id])
    //                     ->one();

    //         $flat->img = 32;
    //         $flat->save();
    //         if ($flat->getErrors()) {
    //             var_dump($flat->getErrors());
    //         }

    //         $id = end($floor)->id-4;

    //         $flat = ApartmentsB::find()
    //                     ->where(['id' => $id])
    //                     ->one();

    //         $flat->img = 42;
    //         $flat->save();
    //         if ($flat->getErrors()) {
    //             var_dump($flat->getErrors());
    //         }

    //         $id = end($floor)->id-7;

    //         $flat = ApartmentsB::find()
    //                     ->where(['id' => $id])
    //                     ->one();

    //         $flat->img = 32;
    //         $flat->save();
    //         if ($flat->getErrors()) {
    //             var_dump($flat->getErrors());
    //         }
    //     }
        
    // }

    // public function actionDbch2()
    // {
    //     $floor = 0;
    //     $j = 1;
    //     for ($i=2; $i < 45; $i++) {

    //         $floor = ApartmentsB::find()
    //                     ->where(['floor_num' => $i])
    //                     ->one();

    //         $id = $floor->id+1;

    //         $flat = ApartmentsB::find()
    //                     ->where(['id' => $id])
    //                     ->one();
    //         $flat->img = 32;
    //         $flat->save();
    //         if ($flat->getErrors()) {
    //             var_dump($flat->getErrors());
    //         }

    //         $id = $floor->id+3;

    //         $flat = ApartmentsB::find()
    //                     ->where(['id' => $id])
    //                     ->one();
    //         $flat->img = 32;
    //         $flat->save();
    //         if ($flat->getErrors()) {
    //             var_dump($flat->getErrors());
    //         }
    //     }
        
    // }

    // public function actionDbch24()
    // {
    //     $floor = 0;
    //     $j = 1;
    //     for ($i=2; $i < 45; $i++) {
    //         $floor = ApartmentsB::find()
    //                     ->where(['floor_num' => $i])
    //                     ->all();

    //         $id = end($floor)->id-2;

    //         $flat = ApartmentsB::find()
    //                     ->where(['id' => $id])
    //                     ->one();

    //         $flat->img = 44;
    //         $flat->save();
    //         if ($flat->getErrors()) {
    //             var_dump($flat->getErrors());
    //         }
    //     }
        
    // }

    // public function actionDbch25()
    // {
    //     $floor = 0;
    //     $j = 1;
    //     for ($i=2; $i < 45; $i++) {
    //         $floor = ApartmentsB::find()
    //                     ->where(['floor_num' => $i])
    //                     ->all();

    //         $id = end($floor)->id-1;

    //         $flat = ApartmentsB::find()
    //                     ->where(['id' => $id])
    //                     ->one();

    //         $flat->img = 45;
    //         $flat->save();
    //         if ($flat->getErrors()) {
    //             var_dump($flat->getErrors());
    //         }
    //     }
        
    // }

    // public function actionDbch()
    // {
    //     $floor = 0;
    //     $j = 1;
    //     for ($i=2; $i < 45; $i++) {
    //         $floor = ApartmentsB::find()
    //                     ->where(['floor_num' => $i])
    //                     ->all();

    //         $id = end($floor)->id;

    //         $flat = ApartmentsB::find()
    //                     ->where(['id' => $id])
    //                     ->one();

    //         $flat->img = 46;
    //         $flat->save();
    //         if ($flat->getErrors()) {
    //             var_dump($flat->getErrors());
    //         }
    //     }
        
    // }

    // public function actionDbfix()
    // {
    //     $floor = 0;
    //     $j = 1;
    //     for ($i=1; $i < 1102; $i++) {
    //         $q = ApartmentsB::find()
    //                     ->where(['id' => $i])
    //                     ->one();

    //         // var_dump('<pre>');
    //         // var_dump($q);
    //         // var_dump('</pre>');
    //         // die;
            
    //         if ($q->floor_num != $floor) {
    //             $floor = $q->floor_num;
    //             $j = 1;
    //         }

    //         ++$j;
    //         $q->save();
    //         if ($q->getErrors()) {
    //             var_dump($q->getErrors());
    //         }
    //     }
        
    // }

    // public function actionDb()
    // {
    //     $floor = 0;
    //     $j = 1;
    //     for ($i=1; $i < 1102; $i++) {
    //         $q = ApartmentsB::find()
    //                     ->where(['id' => $i])
    //                     ->one();

    //         // var_dump('<pre>');
    //         // var_dump($q);
    //         // var_dump('</pre>');
    //         // die;
            
    //         if ($q->floor_num != $floor) {
    //             $floor = $q->floor_num;
    //             $j = 1;
    //         }

    //         switch ($j) {
    //             case 1:
    //                 $q->img = 2;
    //                 break;
    //             case 2:
    //                 $q->img = 3;
    //                 break;
    //             case 3:
    //                 $q->img = 4;
    //                 break;
    //             case 4:
    //                 $q->img = 5;
    //                 break;
    //             case 19:
    //                 $q->img = 25;
    //                 break;
    //             case 20:
    //                 $q->img = 24;
    //                 break;
    //             case 21:
    //                 $q->img = 23;
    //                 break;
    //             case 22:
    //                 $q->img = 6;
    //                 break;
    //             case 24:
    //                 $q->img = 7;
    //                 break;
    //             case 26:
    //                 $q->img = 8;
    //                 break;
    //             default:
    //                 break;
    //         }
    //         ++$j;
    //         $q->save();
    //         if ($q->getErrors()) {
    //             var_dump($q->getErrors());
    //         }
    //     }
        
    // }

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
