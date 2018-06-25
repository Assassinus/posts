<?php

use yii\db\Migration;

/**
 * Handles the creation of table `posts`.
 */
class m180621_221032_create_posts_table extends Migration
{
    /**
     * Создать таблицу posts
     */
    public function safeUp()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'title' => $this->string(150),
            'description' => $this->text()
        ]);
    }

    /**
     * Откатить миграцию
     */
    public function safeDown()
    {
        $this->dropTable('posts');
    }
}
