<?php
namespace frontend\controllers;
use Yii;
use app\models\Stu;
use app\models\Upload;
use app\models\Location;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



class StuController extends Controller
{  
	 public function actionIndex(){
        $stu = Stu::find()->all();
       return $this->render('index', ['model' => $stu]);
    }

    public function actionInsert(){
        $model = new Stu();
        if($model->load(Yii::$app->request->post()) && $model->save()){
            if($model->sendEmail(Yii::$app->params['adminEmail'])){
                Yii::$app->session->setFlash('success', 'Check email for your details.');
            }
            return $this->redirect(['index']);
        }
		return $this->renderAjax('ins', ['model' => $model]);
    }

    public function actionEdit($id){
        $edit = Stu::find()->where(['id' => $id])->one();
  		if($edit->load(Yii::$app->request->post()) && $edit->save()){
            return $this->redirect(['index']);
        }
  		return $this->render('edit', ['edit' => $edit]);
    }

    public function actionDel($id){
        $model = Stu::findOne($id);
        $model->delete();
        return $this->redirect(['index']);
    }

    public function actionIpe(){
    	$model=new Upload();
    	if(Yii::$app->request->isPost){
    		$model->file= UploadedFile::getIlnstance($model,'file');
    		if($model->file && $model->validate()){
    			if($model->file->saveAs('upload/'.$model->file->basename.'.'.$model->file->extension)){
					$inputFile='upload/'.$model->file->basename.'.'.$model->file->extension;
                	try{
                		$inputFileType=\PHPExcel_IOFactory::identify($inputFile);
                		$objReader=\PHPExcel_IOFactory::createReader($inputFileType);
                		$objPHPExcel=$objReader->load($inputFile);
                	   }
                	catch(Exception $e){ die('Error'); }
                	$sheet= $objPHPExcel->getSheet(0);
                	$highestRow	=$sheet->getHighestRow();
                	$highestColumn	=$sheet->getHighestColumn();
                	for($row=1;$row <=$highestRow; $row++  ){
                		$rowData=$sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
                		if($row == 1){
                			continue;
                		}
                		$stu=new Stu();
                   		$stu->name=$rowData[0][0];	
                		$stu->email=$rowData[0][1];
                		$stu->password=$rowData[0][2];
                        $stu->zip_code=$rowData[0][3];
                        $stu->city=$rowData[0][4];
                		$stu->save();
                	}
                    return $this->redirect(['index']);	
    			}
    		}
    	}
    	return $this->render('upload', ['model' => $model]);
    }

    public function actionIps(){
        echo '<div class="alert alert-info" style="text-align:center;margin-top:50px"><strong>Import PhpSpreadsheet loading...</strong> </div>';
        $model=new Upload();
        if(Yii::$app->request->isPost){
            $model->file= UploadedFile::getInstance($model,'file');
            if($model->file && $model->validate()){
                if($model->file->saveAs('upload/'.$model->file->basename.'.'.$model->file->extension)){
                    $inputFile='upload/'.$model->file->basename.'.'.$model->file->extension;
                    if( $model->file->extension=='xlsx'){
                    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
                    }
                    else if( $model->file->extension=='csv'){
                    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Csv');
                    }
                    else{echo "<script>alert('try again with valid file extension')</script> ";}
                    $reader->setReadDataOnly(TRUE);
                    $spreadsheet = $reader->load($inputFile);
                    $worksheet = $spreadsheet->getActiveSheet();
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
                    for($row=1;$row <=$highestRow; $row++  ){
                        $rowData=$worksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
                        if($row == 1){
                            continue;
                        }
                        $stu=new Stu();
                        $stu->name=$rowData[0][0];  
                        $stu->email=$rowData[0][1];
                        $stu->password=$rowData[0][2];
                        $stu->zip_code=$rowData[0][3];
                        $stu->city=$rowData[0][4];
                        $stu->save();
                    }
                    return $this->redirect(['index']);  
                }
            }
        }
        return $this->render('upload', ['model' => $model]);
    }

    public function actionCta(){
        echo '<div class="alert alert-info" style="text-align:center;margin-top:50px"><strong>Import PhpSpreadsheet loading...</strong> </div>';
        $model=new Upload();
        if(Yii::$app->request->isPost){
            $model->file= UploadedFile::getInstance($model,'file');
            if($model->file && $model->validate()){
                if($model->file->saveAs('upload/'.$model->file->basename.'.'.$model->file->extension)){
                    $inputFile='upload/'.$model->file->basename.'.'.$model->file->extension;
                    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Csv');
                    $reader->setReadDataOnly(TRUE);
                    $spreadsheet = $reader->load($inputFile);
                    $worksheet = $spreadsheet->getActiveSheet();
                    $csv =array_map('str_getcsv',file($inputFile));
                    array_walk($csv,function(&$a) use ($csv){
                        $a=array_combine($csv[0], $a);
                    });
                    array_shift($csv);
                    echo '<pre>';print_r($csv);die;
                }
            }
        }
        return $this->render('upload', ['model' => $model]);
    }

    public function actionXtc(){
     
        $model=new Upload();
        if(Yii::$app->request->isPost){
            $model->file= UploadedFile::getInstance($model,'file');
            if($model->file && $model->validate()){
                if($model->file->saveAs('upload/'.$model->file->basename.'.'.$model->file->extension)){
                    $inputFile='upload/'.$model->file->basename.'.'.$model->file->extension;
                    $date=date('d-m-y_h:m:s');
                    $outputFile='upload/'.$date.'_data.csv';
                    $fileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFile);
                    $objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($fileType);
                    $objReader->setReadDataOnly(true);   
                    $objPHPExcel = $objReader->load($inputFile);    
                    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($objPHPExcel,'Csv');
                    if($writer->save($outputFile)){
                        Yii::$app->getSession()->setFlash('success', 'successfully got on to the payment page');
                    }
                    return $this->redirect(['index']);   
                }
            }    
        }   
           echo '<div class="alert alert-info" style="text-align:center;margin-top:70px"><strong>convert xlsx to csv then upload </strong> </div>';
        return $this->render('upload', ['model' => $model]);
    }
   
    public function actionSearch($s){            
        $ses = Stu::find()->where(['name' => $s])->one();
        echo Json::encode($ses);
    }

    public function actionExport()
    {   


$path=Yii::getAlias('@webroot').'/upload';
$file=$path.'/index.jpeg';
if(file_exists($file)){
    Yii::$app->response->xSendFile($file);
}
else{
    echo "<script>alert('no')</script>";
}

   //  $img = Yii::$app->request->baseUrl.'/upload/index.jpeg';
 //echo "<img src='".$img."'>";
//Yii::$app->response->xsendFile($img);

     
       // Yii::$app->response->xsendFile('index.jpeg');
            // echo '<div class="alert alert-info" style="text-align:center;margin-top:50px"><strong>Import PhpSpreadsheet loading...</strong> </div>';
            //         $model=new Upload();
            //      //    $inputFile='upload/ex.xlsx';
            //          $spreadsheet= new \PhpOffice\PhpSpreadsheet\Spreadsheet(); 
            //          $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
            //          //$spreadsheet = $writer->load($spreadsheet);
            //         $sheet = $spreadsheet->getActiveSheet();
            //         $sheet->setCellValue('A1', 'Hello World !');

            //      //   $writer = new Xlsx($spreadsheet);
            //        $dt=date('d-m-y');
            //        if($writer->save('upload/'.$dt.'1.xlsx'))
            //        {
            //         Yii::$app->response->xsendFile('upload/'.$dt.'1.xlsx');
            //        }
    }   

 /*public function actionInsert()
    {
        $model = new Stu();
        if ($model->load(Yii::$app->request->post())) 
        {
             $model->sendEmail(Yii::$app->params['adminEmail']);

        }
         return $this->render('ins', ['model' => $model]);
    }
*/

} 

 ?>