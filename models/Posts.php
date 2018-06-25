<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['title'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }

    public static function getPostsForJs($page = null){
        if (empty($page))
            $page = 1;
        $limit = 10;
        $posts = Posts::find()->limit($limit + 1)->offset(($page - 1) * $limit)->all();
        $isPaginate = false;
        if (count($posts == $limit + 1)){
            array_pop($posts);
            $isPaginate = true;
        }
        return [
          'posts' => $posts,
            'isPaginate' => $isPaginate
        ];
    }
}
