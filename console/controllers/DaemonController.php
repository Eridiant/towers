<?php
namespace console\controllers;

use Yii;
use yii\helpers\Url;
use yii\console\Controller;
use backend\models\Log;

/**
 * Test controller
 */
class DaemonController extends Controller
{
    public function actionIndex() {
        $log = new Log();
        $log->value = "console";
        try {
            $log->save();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}