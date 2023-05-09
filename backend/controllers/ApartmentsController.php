<?php

namespace backend\controllers;

use Yii;
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

    public function actionStatus()
    {

        $request = Yii::$app->request;

        if ($request->isPost) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $block = $request->post('block');
            $value = $request->post('value');
            $check = !$request->post('check');
            if (!preg_match("/d\/(.*?)\//", $value, $res)) return['data' => ['success' => 'false']];
            $id = $res[1];
            $list = 0;
            $csv = file_get_contents("https://docs.google.com/spreadsheets/d/$res[1]/export?format=csv");
            $csv = explode(PHP_EOL, $csv);
            $arr = array_map('str_getcsv', $csv);
            if ($block == 'a') {
                // https://docs.google.com/spreadsheets/d/1yWtW0vzysjJBMy_80ihXRuYebw9MR1sE/edit?usp=sharing&ouid=113392952037975246587&rtpof=true&sd=true
                
                $rrr = $this->dba($arr, $check);
            }
            if ($block == 'b') {
                // https://docs.google.com/spreadsheets/d/1yWtW0vzysjJBMy_80ihXRuYebw9MR1sE/edit?usp=sharing&ouid=113392952037975246587&rtpof=true&sd=true
                
                $rrr = $this->dbb($arr, $check);
            }
            if ($block == 'c') {
                // https://docs.google.com/spreadsheets/d/1yWtW0vzysjJBMy_80ihXRuYebw9MR1sE/edit?usp=sharing&ouid=113392952037975246587&rtpof=true&sd=true
                
                $rrr = $this->dbc($arr, $check);
            }
            return ['data' => ['success' => $block . '|' . $rrr]];
            // return $this->render('status', compact('stitus'));
        }
        return $this->render('status');
    }
    // 1-reserv 2 sold
    public function dba($arr, $check)
    {
        $vr = '';
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
                    if ($value[9] == 1 || str_contains(mb_strtolower($value[9], 'UTF-8'), 'booked') || str_contains($value[9], 'ჯავშანი')) {

                        $q = ApartmentsA::find()
                            ->where(['num' => $d])
                            ->one();

                        if (is_null($q->status) || $q->status == 1) {
                            $vr .= '| error=' . $value[0] . '</br>';
                            continue;
                        }

                        if ($check) {
                            $q->status = 1;
                            $vr .= '| id=' . $value[0] . '_st=1 </br>';
                            $q->save();
                        } else {
                            $vr .= '| id=' . $value[0] . ' | old=' . $q->status . ' | new=1 </br>';
                        }
                    } elseif ($value[9] == 2 || str_contains(mb_strtolower($value[9]), 'sold') || str_contains($value[9], 'დახურული') || str_contains($value[9], 'გაიყიდა')) {
                        $q = ApartmentsA::find()
                                ->where(['num' => $d])
                                ->one();

                        if (is_null($q->status) || $q->status == 2) {
                            $vr .= '| error=' . $value[0] . '</br>';
                            continue;
                        }

                        if ($check) {
                            $q->status = 2;
                            $vr .= '| id=' . $value[0] . '_st=2 </br>';
                            $q->save();
                        } else {
                            $vr .= '| id=' . $value[0] . ' | old=' . $q->status . ' | new=2 </br>';
                        }
                    } elseif ($d != 0 ) {
                        $q = ApartmentsA::find()
                                ->where(['num' => $d])
                                ->one();

                        if (is_null($q->status) || $q->status == 0) {
                            $vr .= '| error=' . $value[0] . '</br>';
                            continue;
                        }

                        if ($check) {
                            $q->status = 0;
                            $vr .= '| id=' . $value[0] . '_st=0 </br>';
                            // var_dump('| id=' . $d);
                            $q->save();
                        } else {
                            $vr .= '| id=' . $value[0] . ' | old=' . $q->status . ' | new=0 </br>';
                        }
                    }
                }
            }
        }
        return $vr;
    }
    public function dbb($arr, $check)
    {
        $vr = '';
        foreach ($arr as $key => $value) {
            // var_dump('<pre>');
            // var_dump($value[0]);
            // var_dump('</pre>');
            if (!intval($value[0])) continue;
            if ($value[9] == 1 || str_contains(mb_strtolower($value[9], 'UTF-8'), 'booked') || str_contains($value[9], 'ჯავშანი')) {

                $q = ApartmentsB::find()
                    ->where(['id' => $value[0]])
                    ->one();

                if (is_null($q->status) || $q->status == 1) {
                    $vr .= '| error=' . $value[0] . '</br>';
                    continue;
                }

                if ($check) {
                    $q->status = 1;
                    $vr .= '| id=' . $value[0] . '_st=1 </br>';
                    $q->save();
                } else {
                    $vr .= '| id=' . $value[0] . ' | old=' . $q->status . ' | new=1 </br>';
                }
            } elseif ($value[9] == 2 || str_contains(mb_strtolower($value[9]), 'sold') || str_contains($value[9], 'დახურული') || str_contains($value[9], 'გაიყიდა')) {

                $q = ApartmentsB::find()
                        ->where(['id' => $value[0]])
                        ->one();

                if (is_null($q->status) || $q->status == 2) {
                    $vr .= '| error=' . $value[0] . '</br>';
                    continue;
                }

                if ($check) {
                    $q->status = 2;
                    $vr .= '| id=' . $value[0] . '_st=2 </br>';
                    $q->save();
                } else {
                    $vr .= '| id=' . $value[0] . ' | old=' . $q->status . ' | new=2 </br>';
                }
            } else {

                $q = ApartmentsB::find()
                        ->where(['id' => $value[0]])
                        ->one();

                if (is_null($q->status) || $q->status == 0) {
                    $vr .= '| error=' . $value[0] . '</br>';
                    continue;
                }

                if ($check) {
                    $q->status = 0;
                    $vr .= '| id=' . $value[0] . '_st=0 </br>';
                    $q->save();
                } else {
                    $vr .= '| id=' . $value[0] . ' | old=' . $q->status . ' | new=0 </br>';
                }
            }
        }
        return $vr;
    }

    public function dbc($arr, $check)
    {
        $vr = '';
        foreach ($arr as $key => $value) {
            if (!intval($value[0])) continue;
            // var_dump('<pre>');
            // var_dump($value[0]);
            // var_dump('</pre>');
            $d = intval(preg_replace('/[^0-9]/', '', $value[0]));

            if ($value[6] == 2 || str_contains(mb_strtolower($value[6]), 'sold') || str_contains($value[6], 'დახურული') || str_contains($value[6], 'გაიყიდა')) {
                $q = ApartmentsC::find()
                        ->where(['num' => $d])
                        ->one();

                if (is_null($q->status) || $q->status == 2) {
                    $vr .= '| error=' . $value[0] . '</br>';
                    continue;
                }

                if ($check) {
                    $q->status = 2;
                    $vr .= '| id=' . $value[0] . '_st=2 ' . 'value=' . $value[6] . '</br>';
                    $q->save();
                } else {
                    $vr .= '| id=' . $value[0] . ' | old=' . $q->status . ' | new=2 </br>';
                }

                //
            } elseif ($value[6] == 1 || trim($value[6]) !== "") {
                // str_contains(mb_strtolower($value[6], 'UTF-8'), 'booked') || str_contains($value[6], 'ჯავშანი')
                $q = ApartmentsC::find()
                    ->where(['num' => $d])
                    ->one();

                if (is_null($q->status) || $q->status == 1) {
                    $vr .= '| error=' . $value[0] . '</br>';
                    continue;
                }

                if ($check) {
                    $q->status = 1;
                    $vr .= '| id=' . $value[0] . '_st=1 ' . 'value=' . $value[6] . '</br>';
                    $q->save();
                } else {
                    $vr .= '| id=' . $value[0] . ' | old=' . $q->status . ' | new=1 </br>';
                }
            } else {

                $q = ApartmentsC::find()
                        ->where(['num' => $d])
                        ->one();

                if (is_null($q->status) || $q->status == 0) {
                    $vr .= '| error=' . $value[0] . '</br>';
                    continue;
                }

                if ($check) {
                    $q->status = 0;
                    $vr .= '| id=' . $value[0] . '_st=0 </br>';
                    $q->save();
                } else {
                    $vr .= '| id=' . $value[0] . ' | old=' . $q->status . ' | new=0 </br>';
                }
            }
        }
        return $vr;
    }

    // https://docs.google.com/spreadsheets/d/197e9p3EvRIRv1EiQjO8_o5-TKdINNc6r/edit?usp=sharing&ouid=102071057558095013478&rtpof=true&sd=true
    // 1-reserv 2 sold
    public function actionDba()
    {
        $id = '197e9p3EvRIRv1EiQjO8_o5-TKdINNc6r';
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
                    if ($value[9] == 1) {

                        $q = ApartmentsA::find()
                            ->where(['num' => $d])
                            ->one();
                        $q->status = 1;
                        var_dump('| id=' . $value[0] . '_st=1 </br>');
                        $q->save();
                    } elseif ($value[9] == 2) {
                        $q = ApartmentsA::find()
                                ->where(['num' => $d])
                                ->one();
                        $q->status = 2;
                        var_dump('| id=' . $value[0] . '_st=2 </br>');
                        $q->save();
                    } elseif ($d != 0 ) {
                        $q = ApartmentsA::find()
                                ->where(['num' => $d])
                                ->one();

                        $q->status = 0;
                        var_dump('| id=' . $value[0] . '_st=0 </br>');
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

    // https://docs.google.com/spreadsheets/d/1cbBOf9gcQprrgSxwkqvdGAsOD9bQjjta/edit?usp=sharing&ouid=102071057558095013478&rtpof=true&sd=true
    public function actionDbb()
    {
        $id = '1cbBOf9gcQprrgSxwkqvdGAsOD9bQjjta';
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
                        var_dump('| id=' . $value[0] . '_st=1 </br>');
                        $q->save();
                    } elseif ($value[9] == 2) {

                        $q = ApartmentsB::find()
                                ->where(['id' => $value[0]])
                                ->one();
                        $q->status = 2;
                        var_dump('| id=' . $value[0] . '_st=2 </br>');
                        $q->save();
                    } else {

                        $q = ApartmentsB::find()
                                ->where(['id' => $value[0]])
                                ->one();
                        $q->status = 0;
                        var_dump('| id=' . $value[0] . '_st=0 </br>');
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
    public function actionDbfc()
    {
        $posts = Yii::$app->db->createCommand('SELECT MAX(floor_num)
        FROM {{%apartments_c}}
        GROUP BY floor_num
        HAVING COUNT(floor_num) = 24
        ')->queryAll();
        var_dump('<pre>');
        var_dump($posts);
        var_dump('</pre>');
        die;
        
        // $sql = "INSERT INTO {{%floor_c}} (floor)
        // SELECT floor_num
        // FROM {{%apartments_c}}
        // GROUP BY floor_num";

        // \Yii::$app->db->createCommand($sql)->execute();
    }
    public function actionDbac()
    {
        $model = ApartmentsC::find()->where(['<','floor_num', 40])->all();

        foreach ($model as $value) {
            // var_dump($value->num % 100);
            $num = $value->num % 100;
            switch ($num) {
                case 8:
                case 10:
                case 12:
                case 14:
                    $value->img = 6;
                    break;
                case 9:
                case 11:
                case 13:
                case 15:
                    $value->img = 7;
                    break;
                
                default:
                    $value->img = $num;
                    break;
            }
            $value->save();
        }
        die;

    }
    public function actionPrice()
    {
        $model = Yii::$app->db->createCommand('SELECT MIN(floor_num) AS min_floor, MAX(floor_num) AS max_floor, MAX(money_wh_m) AS max_white, MAX(money_m) AS max_turnkey, MAX(en) AS area
        FROM {{%apartments_c}}
        GROUP BY floor_num, en
        -- ORDER BY en
        ')->queryAll();

        return $this->render('price', compact('model'));
    }
    public function actionFix()
    {
        $url = 'https://docs.google.com/spreadsheets/d/1lO3yWHDfd9RcdMGcN7TA0hheHlL6go0dSxusNtuVR_M/edit?usp=sharing';
        if (!preg_match("/d\/(.*?)\//", $url, $res)) return false;
        $id = $res[1];
        $list = 0;
        $csv = file_get_contents("https://docs.google.com/spreadsheets/d/$id/export?format=csv");
        $csv = explode(PHP_EOL, $csv);
        $arr = array_map('str_getcsv', $csv);
        // var_dump('<pre>');
        // var_dump($arr);
        // var_dump('</pre>');
        // die;
        $models = ApartmentsC::find()->all();
        foreach ($models as $model) {
            $this->table($model, $arr);
        }
    }
    protected function table($model, $arr)
    {
        foreach ($arr as $value) {
            $min_max = explode('-', $value[0]);
            // var_dump($min_max);
            if ($model->floor_num >= $min_max[0] && $model->floor_num <= $min_max[1]) {
                if ($model->en == "yard") {
                    $model->money_wh_m = (int)str_replace(['$', ' '], '', $value[1]);
                    $model->money_m = (int)str_replace(['$', ' '], '', $value[2]);
                }
                if ($model->en == "port and city") {
                    $model->money_wh_m = (int)str_replace(['$', ' '], '', $value[3]);
                    $model->money_m = (int)str_replace(['$', ' '], '', $value[4]);
                }
                if ($model->en == "alley") {
                    $model->money_wh_m = (int)str_replace(['$', ' '], '', $value[5]);
                    $model->money_m = (int)str_replace(['$', ' '], '', $value[6]);
                }
                // echo " " . $model->en . "|" . $model->money_m . "|" . $model->money_wh_m . PHP_EOL;
                // var_dump('<pre>');
                // var_dump($value);
                // var_dump('</pre>');
                // die;
                
                $model->save();
                var_dump($model->getErrors());
                
                return;
            }
            // [0]=>
            // string(5) "11-15"
            // [1]=>
            // string(4) "$750"
            // [2]=>
            // string(7) "$1 350"
            // [3]=>
            // string(4) "$800"
            // [4]=>
            // string(7) "$1 400"
            // [5]=>
            // string(4) "$850"
            // [6]=>
            // string(7) "$1 450"
        }
    }
    public function actionPrb()
    {
        $url = 'https://docs.google.com/spreadsheets/d/1k2x-UCI30f6bckdhlVWhEUi2ttQGmBXS/edit?usp=sharing&ouid=102071057558095013478&rtpof=true&sd=true';
        if (!preg_match("/d\/(.*?)\//", $url, $res)) return false;
        $id = $res[1];
        $list = 0;
        $csv = file_get_contents("https://docs.google.com/spreadsheets/d/$id/export?format=csv");
        $csv = explode(PHP_EOL, $csv);
        $arr = array_map('str_getcsv', $csv);
        $i = 0;
        foreach ($arr as $key => $value) {
            if (!intval($value[0])) continue;

            // var_dump('<pre>');
            // // var_dump($value[10],$value[9],$value[8],$value[7]);
            // var_dump($value);
            
            // var_dump('</pre>');
            // if ($i > 2) {
            //     die;
            // }
            // $i++;

            // continue;

            $q = ApartmentsB::find()
                ->where(['num' => (int)$value[0]])
                ->one();
            // var_dump('<pre>');
            // var_dump($this->numint($this->fixNum($value[10])));
            // var_dump($value);
            // var_dump('</pre>');
            // if ($i > 2) {
            //     die;
            // }
            // $i++;
            // continue;

            // $q->num = $value[0];
            // var_dump('<pre>');
            // var_dump($q->money);
            // var_dump('</pre>');
            // if ($i > 7) {
            //     die;
            // }
            // $i++;
            // continue;
            

            $q->money = $this->numint($this->fixNum($value[13]));
            $q->money_m = $this->numint($this->fixNum($value[12]));
            $q->money_wh = $this->numint($this->fixNum($value[11]));
            $q->money_wh_m = $this->numint($this->fixNum($value[10]));

            $q->save();
            if ($q->getErrors()) {
                var_dump($q->getErrors());
            }
        }
    }
    public function actionPrc()
    {
        $url = 'https://docs.google.com/spreadsheets/d/1Empd2jCtKmo0Qf8W4yANGKVr28hHWObd/edit?usp=sharing&ouid=102071057558095013478&rtpof=true&sd=true';
        if (!preg_match("/d\/(.*?)\//", $url, $res)) return false;
        $id = $res[1];
        $list = 0;
        $csv = file_get_contents("https://docs.google.com/spreadsheets/d/$id/export?format=csv");
        $csv = explode(PHP_EOL, $csv);
        $arr = array_map('str_getcsv', $csv);
        $i = 0;
        foreach ($arr as $key => $value) {
            if (!intval($value[0])) continue;

            // var_dump('<pre>');
            // var_dump($value[10],$value[9],$value[8],$value[7]);
            // var_dump('</pre>');
            // if ($i > 2) {
            //     die;
            // }
            // $i++;

            // continue;

            $q = ApartmentsC::find()
                ->where(['num' => (int)$value[0]])
                ->one();
            // var_dump('<pre>');
            // var_dump($this->numint($value[10]));
            // var_dump($this->numint($value[9]));
            // var_dump($this->numint($value[8]));
            // var_dump($this->numint($value[7]));
            // // var_dump($value);
            // var_dump('</pre>');
            // if ($i > 5) {
            //     die;
            // }
            // $i++;
            // continue;
                            
            // $q->num = $value[0];

            // $q->money = $this->numint($this->fixNum($value[10]));
            // $q->money_m = $this->numint($this->fixNum($value[9]));
            // $q->money_wh = $this->numint($this->fixNum($value[8]));
            // $q->money_wh_m = $this->numint($this->fixNum($value[7]));
            $q->money = $this->numint($value[10]);
            $q->money_m = $this->numint($value[9]);
            $q->money_wh = $this->numint($value[8]);
            $q->money_wh_m = $this->numint($value[7]);

            $q->save();
            if ($q->getErrors()) {
                var_dump($q->getErrors());
            }
        }
    }
    protected function fixNum($a)
    {
        return str_replace('.',',',str_replace(',','',$a));
    }
    public function actionDbc()
    {
        $url = 'https://docs.google.com/spreadsheets/d/1QO2LQ23IqJUz8jiE7Q_y8M8eC07FT1xU/edit?usp=sharing&ouid=102071057558095013478&rtpof=true&sd=true';
        if (!preg_match("/d\/(.*?)\//", $url, $res)) return false;
        $id = $res[1];
        $list = 0;
        $csv = file_get_contents("https://docs.google.com/spreadsheets/d/$id/export?format=csv");
        $csv = explode(PHP_EOL, $csv);
        $arr = array_map('str_getcsv', $csv);
        // var_dump('<pre>');
        // var_dump($arr);
        // var_dump('</pre>');
        // die;
        $i = 0;
        foreach ($arr as $key => $value) {
            if (!intval($value[0])) continue;
            // var_dump('<pre>');
            // var_dump($value[0]);
            // var_dump('</pre>');
            // if ($i > 2) {
            //     die;
            // }
            // $i++;

            // continue;

            $q = new ApartmentsC();
                            
            $q->num = $value[0];
            $q->floor_num = (int)($value[0] / 100);

            $q->money = $this->numint($value[10]);
            $q->money_m = $this->numint($value[9]);
            $q->money_wh = $this->numint($value[8]);
            $q->money_wh_m = $this->numint($value[7]);

            $q->balcony_area = $this->numfl($value[3]);
            $q->living_space = $this->numfl($value[2]);
            $q->total_area = $this->numfl($value[4]);


            // if (str_contains($value[5], 'Yard')) var_dump('yard');ეზოს
            // if (str_contains($value[5], 'Alley')) var_dump('alley');ხეივნის
            // if (str_contains($value[5], 'Port and city')) var_dump('port and city');პორტისა და ქალაქის
            if (str_contains($value[5], 'Yard')) {
                $q->ru = 'во двор';
                $q->ge = 'ეზოს';
                $q->en = 'yard';
            }
            if (str_contains($value[5], 'Alley')) {
                $q->ru = 'аллея';
                $q->ge = 'ხეივნის';
                $q->en = 'alley';
            }
            if (str_contains($value[5], 'Port and city')) {
                $q->ru = 'порт и город';
                $q->ge = 'პორტისა და ქალაქის';
                $q->en = 'port and city';
            }

            $q->save();
            if ($q->getErrors()) {
                var_dump($q->getErrors());
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
