<?php

namespace app\controllers;

use app\models\Posts;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
class SiteController extends Controller
{

    public function actionIndex()
    {
        $posts = Posts::find()->limit(2)->all();
        return $this->render('index', [
            'posts' => $posts,
        ]);
    }
}
