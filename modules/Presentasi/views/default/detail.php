<?php
use yii\base\Widget;
use yii\widgets\LinkPager;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Addon Yii2';
?>
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
    
.carousel {
  position: relative;
}
.carousel-item img {
  object-fit: cover;
}
#carousel-thumbs {
  background: rgba(255,255,255,.3);
  bottom: 0;
  left: 0;
  padding: 0 50px;
  right: 0;
}
#carousel-thumbs img {
  border: 5px solid transparent;
  cursor: pointer;
}
#carousel-thumbs img:hover {
  border-color: rgba(255,255,255,.3);
}
#carousel-thumbs .selected img {
  border-color: #fff;
}
.carousel-control-prev,
.carousel-control-next {
  width: 50px;
}
@media all and (max-width: 767px) {
  .carousel-container #carousel-thumbs img {
    border-width: 3px;
  }
}
@media all and (min-width: 576px) {
  .carousel-container #carousel-thumbs {
    position: absolute;
  }
}
@media all and (max-width: 576px) {
  .carousel-container #carousel-thumbs {
    background: #ccccce;
  }
}
</style>



<div class="album py-5 bg-light">
    <div class="container">

    <div class="row">
        <div class="container mt-5">
          <div class="carousel-container position-relative row">
                
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                  <?php foreach($data['images'] as $key => $val): ?>
                  <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>" data-slide-number="<?php echo $key; ?>">
                    <img src="<?= Yii::$app->request->baseUrl .'/dummy/'.$val['name'] ?>" class="d-block w-100" alt="" data-remote="<?= Yii::$app->request->baseUrl .'/dummy/'.$val['name'] ?>" 
                    data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                  </div>
                  <?php endforeach; ?>
                 
                </div>
              </div> 

              <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                

                      <?php 
                      $count = 0;
                      foreach($data['images'] as $key => $val): ?>
                        <?php 
                          if($count == 0){
                        ?>
                          <div class="carousel-item active">
                            <div class="row mx-0">
                        <?php
                          }
                        ?>


                              <div id="carousel-selector-<?php echo $key; ?>" class="thumb col-4 col-sm-2 px-1 py-2 selected" data-target="#myCarousel" data-slide-to="<?php echo $key; ?>">
                                <img src="<?= Yii::$app->request->baseUrl .'/dummy/'.$val['name'] ?>" class="img-fluid" alt="...">
                              </div>


                            <?php
                               if($count == 5 || $key == count($data['images'])){
                            ?>
                          </div>
                        </div>
                        <?php
                            $count = 0;
                          } else {
                        ?>

                      <?php 
                          $count++;
                        }
                      ?>
                      <?php endforeach; ?>
                      
                </div>

                <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
          
              </div>  
          </div>    
        </div>
         
        </div> 
      </div> 


                    
     <!--  <div class="col-md-6">
            <button id="google-slides" class="rounded btn btn-primary btn-lg active" >
              <span class="flex-1 text-center pl-2">Download</span>
            </button>
      </div> -->
    </div>

<div class="text">
          <h2><?php echo $data['title']; ?></h2>
          <p>
              <?php echo $data['description']; ?>
          </p>
      </div>  
<br />


<div class="row">
  <div class="col-md-4" >
  <h3 class="text-2xl font-medium mb-6 text-gray-900">
              <strong> Related presentations </strong>        </h3>
  </div>
</div>

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

 