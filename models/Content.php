<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $menu_id
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'menu_id'], 'required'],
            [['description'], 'string'],
            [['menu_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'menu_id' => 'Menu ID',
        ];
    }
}
