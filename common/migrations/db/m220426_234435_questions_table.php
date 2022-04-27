<?php

use yii\db\Migration;

/**
 * Class m220426_234435_questions_table
 */
class m220426_234435_questions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%questions}}', [
            'id' => $this->primaryKey(),
            'firstname' => $this->string(40)->notNull(),
            'lastname' => $this->string(40)->notNull(),
            'file' => $this->string(255)->Null(),
            'file_path' => $this->string(255)->Null(),
            'file_base_url' => $this->string(255)->Null(),
            'status' => $this->integer()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%questions}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220426_234435_questions_table cannot be reverted.\n";

        return false;
    }
    */
}
