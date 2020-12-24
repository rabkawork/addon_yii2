<?php
namespace app\modules\Presentasi\models;

use yii\base\Model;

/**
 * UploadForm is the model behind the upload form.
 */
class Publish extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $status;

    public $harga;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
                 [['status','harga'], 'required']
        ];
    }
}