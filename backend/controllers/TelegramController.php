<?php

namespace backend\controllers;

use backend\models\telegram\TelegramContent;
use backend\models\telegram\TelegramImage;
use backend\models\telegram\TelegramMessage;
use backend\models\telegram\TelegramQuery;
use backend\models\telegram\TelegramUser;
use backend\models\telegram\TelegramChat;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * TelegramController implements the CRUD actions for TelegramContent model.
 */
class TelegramController extends Controller
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
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all TelegramContent models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => TelegramContent::find()->andWhere(['<>', 'type_name', 'command']),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TelegramContent model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TelegramContent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TelegramContent();

        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->type_name === "message") {
                $model->type = 0;
            } else {
                $model->type = 1;
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TelegramContent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            // var_dump('<pre>');
            // var_dump($this->request->post()["TelegramImage"]["caption"]);
            // var_dump('</pre>');
            // die;
            // var_dump('<pre>');
            // var_dump($model->images[0]->caption);
            // var_dump('</pre>');
            // die;
            // $model->images->link('caption', [$this->request->post()["TelegramImage"]["caption"]]);
            // $model->images[0]->caption = $this->request->post()["TelegramImage"]["caption"];
            if ($model->type_name === "message") {
                $model->type = 0;
            } else {
                $model->type = 1;
            }
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionChoseImage()
    {
        $request = Yii::$app->request;
        if ($request->post("data") == "image") $type = '{jpg,png}';
        if ($request->post("data") == "animation") $type = '{gif}';
        if ($request->post("data") == "video") $type = '{mp4}';
        if ($request->post("data") == "group") $type = '{jpg,png}';
        // $images = glob("images/swiper/*.*", GLOB_BRACE);
        $images = glob(Yii::getAlias('@frontend') . "/web/tg/*.{$type}", GLOB_BRACE);
        // $images = glob("/backend/web/tg/*.*", GLOB_BRACE);
        // $images = glob("/frontend/web/tg/*.*", GLOB_BRACE);
        
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return ['images' => $images];
    }

    private function forDel()
    {
        function actionSaveRelation()
        {
            $customer = new Customer();
            $customer->name = 'John Doe';
            $customer->email = 'johndoe@example.com';
            
            if ($customer->save()) {
                $order = new Order();
                $order->customer_id = $customer->id;
                $order->product = 'Product 1';
                $order->price = 100;
                
                if ($order->save()) {
                    return 'Relation saved successfully';
                } else {
                    return 'Error saving order: ' . json_encode($order->errors);
                }
            } else {
                return 'Error saving customer: ' . json_encode($customer->errors);
            }
        }

        function actionUpdateRelation($customerId)
        {
            $customer = Customer::findOne($customerId);
            if (!$customer) {
                return 'Error: Customer not found';
            }
            
            $customer->name = 'Jane Doe';
            if ($customer->save()) {
                $order = Order::findOne(['customer_id' => $customer->id]);
                if (!$order) {
                    return 'Error: Order not found';
                }
                
                $order->product = 'Product 2';
                $order->price = 200;
                if ($order->save()) {
                    return 'Relation updated successfully';
                } else {
                    return 'Error updating order: ' . json_encode($order->errors);
                }
            } else {
                return 'Error updating customer: ' . json_encode($customer->errors);
            }
        }

        function actionUpdateRelation($customerId)
        {
            $customer = Customer::findOne($customerId);
            if (!$customer) {
                return 'Error: Customer not found';
            }
            
            $customer->name = 'Jane Doe';
            if ($customer->save()) {
                $order = Order::findOne(['customer_id' => $customer->id]);
                if (!$order) {
                    return 'Error: Order not found';
                }
                
                $order->product = 'Product 2';
                $order->price = 200;
                if ($order->save()) {
                    return 'Relation updated successfully';
                } else {
                    return 'Error updating order: ' . json_encode($order->errors);
                }
            } else {
                return 'Error updating customer: ' . json_encode($customer->errors);
            }
        }

        function actionUpdateRelationWithLink($customerId)
        {
            $customer = Customer::findOne($customerId);
            if (!$customer) {
                return 'Error: Customer not found';
            }
            
            $customer->name = 'Jane Doe';
            if ($customer->save()) {
                $order = new Order();
                $order->product = 'Product 2';
                $order->price = 200;
                if ($customer->link('orders', $order)) {
                    return 'Relation updated successfully';
                } else {
                    return 'Error updating order: ' . json_encode($order->errors);
                }
            } else {
                return 'Error updating customer: ' . json_encode($customer->errors);
            }
        }

        function updateRelation($customerId, $orderProduct, $orderPrice)
        {
            $customer = Customer::findOne($customerId);
            if (!$customer) {
                return 'Error: Customer not found';
            }
            
            $order = Order::findOne(['customer_id' => $customer->id]);
            if (!$order) {
                return 'Error: Order not found';
            }
            
            $order->product = $orderProduct;
            $order->price = $orderPrice;
            if ($order->save()) {
                return 'Relation updated successfully';
            } else {
                return 'Error updating order: ' . json_encode($order->errors);
            }
        }



    }

    /**
     * Deletes an existing TelegramContent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionDelete($id)
    // {
    //     $this->findModel($id)->delete();

    //     return $this->redirect(['index']);
    // }

    /**
     * Finds the TelegramContent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TelegramContent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TelegramContent::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
