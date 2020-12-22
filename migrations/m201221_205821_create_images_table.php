<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%images}}`.
 */
class m201221_205821_create_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%images}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'content_id' => $this->integer()->notNull(),
        ]);

        $this->addColumn('content', 'default_images', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%images}}');
    }
}
