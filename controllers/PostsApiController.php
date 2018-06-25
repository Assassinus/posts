<?php

namespace app\controllers;

use Yii;
use app\models\Posts;
use yii\web\Controller;
use yii\web\Response;


class PostsApiController extends Controller
{
    /**
     * Выводит список постов
     * @param $page
     * @return array
     */
    public function actionIndex($page)
    {
         $page--;
         $posts = Posts::find()->limit(2)->offset(2 * $page)->all();
         Yii::$app->response->format = Response::FORMAT_JSON;
         return $posts;
    }
}
