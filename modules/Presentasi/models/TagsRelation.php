<?php

namespace app\modules\Presentasi\models;

use Yii;

/**
 * This is the model class for table "tags_relation".
 *
 * @property int $id
 * @property int $content_id
 * @property int $tag_id
 */
class TagsRelation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tags_relation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_id', 'tag_id'], 'required'],
            [['content_id', 'tag_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content_id' => 'Content ID',
            'tag_id' => 'Tag ID',
        ];
    }
}
