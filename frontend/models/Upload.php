<?php
namespace app\models;
 
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
 
class Upload extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'Stu';
    }
    public $file;
    
    public function rules()
    {
        return [
            [['file'], 'required'],
             [['file'], 'file']
            // [['file'], 'file','extensions' => 'xlsx, csv']
        ]; 
    }   
}
?>