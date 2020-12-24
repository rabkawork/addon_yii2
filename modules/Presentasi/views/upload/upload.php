<?php
use yii\widgets\ActiveForm;
?>
    <section class="content">
          <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
              <div class="card-header">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>


                <?php
                echo $form->field($model, 'menu_id')->dropDownList(
                $dropdownList
                ); ?>


                <?= $form->field($model, 'file')->fileInput() ?>

                <button class="btn btn-success">Upload</button>
                </div>
                </div>
          </div>

<?php ActiveForm::end() ?>