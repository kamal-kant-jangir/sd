<?php
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\export\ExportMenu;
use yii\widgets\Pjax; 
use yii\widgets\ActiveForm; 
use yii\helpers\ArrayHelper;
?>
<style>
table th,td{
    padding: 10px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $("#modalButton").click(function(){
        $("#modal").modal('show')
        .find("#modalContenct")
        .load($(this).attr('value')); 
    });
    $("#search").blur(function(){
    
        var s=$(this).val();
        $.get('index.php?r=stu/search',{  s : s  }, function(data){
          alert(data);
          //  document.getElementById("ok").innerHTML ='<table border="1" class="table table-striped" style="margin-top:15px"><tr><th>Name</th><th>Email</th><th>Password</th><th>Zip Code</th><th>City</th><th>Edit</th><th>Delete</th></tr></table>';
        })

    });
   
});     
</script>
<script>
//alert('<?php echo "oj" ?>');
</script>
 
<div class="alert alert-info" style="text-align:center">
  <strong>Student Details..!</strong> 
</div>
<div id="message">

          <?= Yii::$app->session->getFlash('success');?>
      </div>
 <?php //echo Html::a('Add new details', ['stu/insert'], ['class' => 'btn btn-info']);
        echo Html::button('Add new details', [ 'value'=>Url::to('index.php?r=stu/insert'), 'class' => 'btn btn-info','id'=>'modalButton']);
  ?>
 <?= Html::a('Add new location', ['location/index'], ['class' => 'btn btn-info']); ?>
 <?= Html::a('Import PHPExcel', ['stu/ipe'], ['class' => 'btn btn-info']); ?>
 <?= Html::a('Import PhpSpreadsheet', ['stu/ips'], ['class' => 'btn btn-info']); ?>
 <?= Html::a('csvToArray(PhpSpreadsheet)', ['stu/cta'], ['class' => 'btn btn-info']); ?>
 <?= Html::a('xlsToCsv', ['stu/xtc'], ['class' => 'btn btn-info']); ?>

 <?php
    Modal::Begin([
            'header'=>'',
            'id'=>'modal',
            'size'=>'modal-lg'
        ]);
    echo "<div id='modalContenct'></div> ";
    Modal::end();
 ?>

  <div class="form-group" style="margin-top:15px">
    <input type="search" class="form-control" id="search">
  </div>
<div  id='ok'>
<table border="1" class="table table-striped" style="margin-top:15px">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Zip Code</th>
        <th>City</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach($model as $m){ ?>
    <tr>
        <td><?= $m->name; ?></td>
        <td><?= $m->email; ?></td>
        <td><?= $m->password; ?></td>
        <td><?= $m->zip_code; ?></td>
        <td><?= $m->city; ?></td>
        <td><?= Html::a("Edit", ['stu/edit', 'id' => $m->id]  ); ?> </td>
        <td><?= Html::a("Delete", ['stu/del', 'id' => $m->id]  ); ?></td>
        </tr>
    <?php } ?>
</table>
</div>
<?= Html::a('Export Excel file', ['stu/export'], ['class' => 'btn btn-info btn-block']); ?>
<div style="margin-top:130px"></div>
