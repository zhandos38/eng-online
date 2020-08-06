<?php


namespace frontend\controllers;


use common\models\Lifehack;
use yii\web\Controller;

class LifehackController extends Controller
{
    public function actionIndex()
    {
        $models = Lifehack::find()->all();
        return $this->render('index', [
            'models' => $models
        ]);
    }

    public function actionView($id)
    {
        $model = Lifehack::findOne(['id' => $id]);
        return $this->render('view', [
            'model' => $model
        ]);
    }
}