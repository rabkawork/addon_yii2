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
    public $title;
    public $description;
    public $menu_id;
    public $file;


    public function attributeLabels()
    {
        return [
            'menu_id' => 'Pilih Menu',
        ];
    }


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // [
            //     ['file'], 'file', 'extensions' => 'pptx'],
        ];
    }
}