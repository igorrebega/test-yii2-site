<?php

use yii\db\Migration;

class m160223_090752_init extends Migration
{
    public function up()
    {
        $this->createTable('books',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string(),
            'date_create'=>$this->integer(),
            'date_update'=>$this->integer(),
            'preview'=>$this->string(),
            'date'=>$this->date(),
            'author_id'=>$this->integer(),
        ]);

        $this->createTable('authors',[
            'id'=>$this->primaryKey(),
            'firstname'=>$this->string(),
            'lastname'=>$this->string()
        ]);

        $this->insert('authors',['firstname'=>'Мет','lastname'=>'Задастра']);
        $this->insert('authors',['firstname'=>'Олександр','lastname'=>'Пушкін']);
        $this->insert('authors',['firstname'=>'Макс','lastname'=>'Кідрук']);
    }

    public function down()
    {
        $this->dropTable('books');
        $this->dropTable('authors');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
