<?php

use yii\db\Migration;

/**
 * Class m201222_061129_update_content_table
 */
class m201222_061129_update_content_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('content', 'file_ppt', $this->String()->notNull());
        $this->addColumn('content', 'is_published', $this->String()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201222_061129_update_content_table cannot be reverted.\n";

        return false;
    }
    */
}
