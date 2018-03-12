<?php
namespace app\models;
 
use Yii;
 
class Stu extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'stu';
    }
      public $file;
    public function rules()
    {
        return [
            [['name', 'email', 'password','zip_code','city'], 'required'],
            [['name', 'email'], 'string', 'max' => 200]
        ];
    }
    public function sendEmail($email) 
    {
   $body = '
    <div style="width:40%;margin-left:10%">
        <div style="background-color:black;color:white;padding:3%;">
            Welcome to <b>SD</b>
        </div>
        <div style="background-color:white;padding:3%"> 
            Hi '.$this->name.',<br>
            <div style="background-color:black;color:white;padding:2%;text-align:center">
                    <strong>You successfully added in SD</strong>
            </div>
            <div style="text-align:center;background-color:lightgrey;padding:3%">               
                <b>your Details:<b><br>
                <div>   
                    <table class="table table-hover">
                        <tbody>
                          <tr>
                            <td>Name:</td>
                            <td>'.$this->name.'</td>
                          </tr>
                          <tr>
                            <td>Email</td>
                            <td>'.$this->email.'</td>
                          </tr>
                          <tr>
                            <td>Password</td>
                            <td>'.$this->password.'</td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
    </div>';
        return Yii::$app->mail->compose()
            ->setTo([$this->email => $this->name])
            ->setFrom($email)
            ->setSubject('Welcome to Student Details')
            ->setHTMLBody($body)
            ->attach('upload/guide-memo.pdf')
            ->send();
    }
}
?>