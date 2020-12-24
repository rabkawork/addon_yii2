<?php

use yii\db\Migration;

/**
 * Class m201224_105340_add_column_content_audio
 */
class m201224_105340_add_column_content_audio extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('content', 'file_audio', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201224_105340_add_column_content_audio cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201224_105340_add_column_content_audio cannot be reverted.\n";

        return false;
    }
    */
}
