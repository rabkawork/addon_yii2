<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tags_relation}}`.
 */
class m201220_212109_create_tags_relation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tags_relation}}', [
            'id' => $this->primaryKey(),
            'content_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tags_relation}}');
    }
}
