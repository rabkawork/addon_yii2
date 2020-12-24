<?php
use yii\base\Widget;
use yii\widgets\LinkPager;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Addon Yii2';
?><div class="album py-5 bg-light">
<div class="container">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <style>
    .swiper-container {
        width: 100%;
        height: 100%;
        }

        .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
        }
    </style>
  <div class="row">
    
    <?php 
        foreach ($models as $model) {
    ?>
    <div class="col-md-4" >
        <div class="card mb-4 box-shadow">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach($model['images'] as $val): ?>
                        <div class="swiper-slide"> 
                            <a href="<?php echo  Url::to(['/Presentasi/default/detail', 'id' => $model['id']]); ?>">
                                <img class="card-img-top rounded" src="<?= Yii::$app->request->baseUrl .'/dummy/'.$val['name']; ?>">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <div class="card-body">
                <h2 class="card-text">  <?php echo $model['title']; ?></h2>
                <p class="d-flex justify-content-between align-items-center" style="text-color:grey;">
                <?php echo substr($model['description'], 0, 100); ?>
                </p>


                <?php 
                    if($model['status'] == 1){
                ?>
                        <a class="btn btn-large btn-primary" href="<?php echo Url::to(['/Presentasi/beli/index','id' => $model['id']]); ?>">Beli Rp. <?php echo number_format($model['harga']); ?> </a>
                <?php 
                    }
                    else{
                ?>
                        <a class="btn btn-large btn-success" href="<?= Yii::$app->request->baseUrl .'/dummy/'.$model['file_ppt']; ?>">Gratis Download </a>
                <?php 
                    }
                ?>

            </div>
        </div>     
    </div>

    <?php
        }   
    ?>
    <script>
    var swiper = new Swiper('.swiper-container', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
  </div>

  <div class="row">
  <?php 
        echo  LinkPager::widget([
            'pagination' => $pages,
            'options' => ['class' => 'pagination justify-content-center'],
            'pageCssClass' => 'page-item',
            'prevPageCssClass' => $page == 1 ? 'page-link' : '',
            'nextPageCssClass' => $page == 1 ? 'page-item' : 'page-link',
            'linkOptions' => ['class' => 'page-link'],
        ]);
    ?>
  </div>
</div>
</div> 