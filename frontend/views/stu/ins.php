<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Location; 
use kartik\select2\Select2;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
     $("#zip").keyup(function(){

        var s=$(this).val();
        $.get('index.php?r=location/search',{  s : s  }, function(data){
            var d=$.parseJSON(data);
            $('#city').attr('value',d.city);
      }); 

    });
});     
</script>


<div class="alert alert-success" style="text-align:center">
  <strong>Add New Details..!</strong> 
</div>
<?php $form = ActiveForm::begin(); ?>
 
    <?= $form->field($model, 'name'); ?>
    <?= $form->field($model, 'email'); ?>
    <?= $form->field($model, 'password'); ?>
     
     <?= $form->field($model, 'zip_code')->textInput(['placeholder' => "Enter Zip Code",'id'=>"zip"])?>


          <?= $form->field($model, 'city')->textInput(['placeholder' => "Enter City",'id'=>"city"])?>
     
    <?= Html::submitButton('Add', ['class' => 'btn btn-success btn-block']); ?>
 
<?php ActiveForm::end(); ?>