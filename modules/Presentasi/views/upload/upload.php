<?php
use kartik\file\FileInput;
use yii\widgets\ActiveForm;

?>
<div class="card">
  <div class="card-body">
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
            <div class="form-group">
                <?php
                echo $form->field($model, 'menu_id')->dropDownList(
                $dropdownList
                ); 
                ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'title')->textInput(['rows' => '6']) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'description')->textarea(['rows' => '6']) ?>
            </div>



            <div class="form-group">
                    
                <?php

                            echo $form->field($model, 'file')->widget(FileInput::classname(), [
                                'options' => ['accept' => 'image/*'],
                            ]); 
                ?>

            </div>


           <div class="form-group">
                <button class="btn btn-success">Upload</button>
                
            </div>
<?php ActiveForm::end() ?>
    </div>
</div>