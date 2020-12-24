<?php
use kartik\file\FileInput;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
    <section class="content">
          <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
              <div class="card-header">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>



                <?php

            echo $form->field($model, 'file')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
            ]); 
                            

            ?>

                <?php
                echo $form->field($model, 'menu_id')->dropDownList(
                $dropdownList
                ); 
                ?>



                <button class="btn btn-success">Uploads</button>
                </div>
                </div>
          </div>

<?php ActiveForm::end() ?>