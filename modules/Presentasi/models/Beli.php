<?php

namespace app\modules\Presentasi\models;

use Yii;

/**
 * This is the model class for table "beli".
 *
 * @property int $id
 * @property int $userId
 * @property int $contentId
 * @property float $harga
 * @property int $is_paid
 * @property string|null $tanggal
 */
class Beli extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'beli';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'contentId', 'harga', 'is_paid'], 'required'],
            [['userId', 'contentId', 'is_paid'], 'integer'],
            [['harga'], 'number'],
            [['tanggal'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'contentId' => 'Content ID',
            'harga' => 'Harga',
            'is_paid' => 'Is Paid',
            'tanggal' => 'Tanggal',
        ];
    }
}
