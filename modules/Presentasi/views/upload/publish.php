<?php
use yii\widgets\ActiveForm;
?>
  <div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
      <div class="card-header">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>


        <?php
        echo $form->field($model, 'status')->dropDownList(
        $dropdownList
        ); ?>


        <?= $form->field($model, 'harga')->textInput() ?>

        <button class="btn btn-primary">Publish</button>
        </div>
        </div>
  </div>

<?php ActiveForm::end() ?>