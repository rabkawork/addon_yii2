<?php
namespace app\modules\Presentasi\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $menu_id;

    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                ['file'], 'file', 'extensions' => 'pptx,ppt', 'skipOnEmpty' => false],
        ];
    }
}