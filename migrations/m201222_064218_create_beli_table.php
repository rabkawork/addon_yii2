<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%beli}}`.
 */
class m201222_064218_create_beli_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%beli}}', [
            'id' => $this->primaryKey(),
            'userId' => $this->integer()->notNull(),
            'contentId' => $this->integer()->notNull(),
            'harga'  => $this->double()->notNull(),
            'is_paid' => $this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%beli}}');
    }
}
