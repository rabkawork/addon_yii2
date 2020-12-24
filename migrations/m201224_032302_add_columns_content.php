<?php

use yii\db\Migration;

/**
 * Class m201224_032302_add_columns_content
 */
class m201224_032302_add_columns_content extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('content', 'status', $this->integer()->notNull());
        $this->addColumn('content', 'harga', $this->double()->notNull());
        $this->addColumn('content', 'tanggal', $this->datetime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201224_032302_add_columns_content cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201224_032302_add_columns_content cannot be reverted.\n";

        return false;
    }
    */
}
