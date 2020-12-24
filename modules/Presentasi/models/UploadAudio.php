<?php
namespace app\modules\Presentasi\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * UploadAudio is the model behind the upload form.
 */
class UploadAudio extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file', 'extensions' => 'mp3', 'skipOnEmpty' => false],
        ];
    }
}