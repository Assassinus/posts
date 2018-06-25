<?php


/* @var $this yii\web\View */
/* @var $posts \app\models\Posts[] */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="container" id="posts">
        <div class="raw" v-for="todo in todos">
            <div class="col-md-12" style="height:30px;"></div>
            <div class="col-md-12">
                <h3>{{ todo.title }}</h3>
            </div>
            <div class="col-md-12" style="height:10px;"></div>
            <div class="col-md-12">
                {{ todo.description }}
            </div>
        </div>
        <div class="raw" v-if="seen">
            <button class="btn btn-success" v-on:click="next">Показать еще</button>
        </div>
    </div>
    <script>
        var page = 2;
        var posts = new Vue({
            el: '#posts',
            data: {
                seen: <?= count($posts) ? 'true' : 'false'?>,
                todos: <?= \yii\helpers\Json::encode($posts) ?>
            },
            methods: {
                next: function () {
                    $.ajax({
                        url: '/posts-api/index?page=' + (page++),
                        dataType: 'json',
                        success: function (next_posts) {
                            if (!next_posts.length) {
                                alert('постов больше нет');
                                posts.seen = false;
                                return;
                            }
                            for (var i in next_posts)
                                posts.todos.push(next_posts[i])
                        }
                    })
                }
            }
        })
    </script>
</div>
