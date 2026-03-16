<?php

use yii\db\Migration;

class m260316_000001_create_cargo_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%cargo}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(100)->notNull(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%cargo}}');
    }
}