<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

use app\modules\Presentasi\models\Menu;

$menuData = Menu::find()
->indexBy('id')
->asArray()
->all();

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrap">


  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>

        <?php foreach($menuData as $key => $data): ?>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo  Url::to(['/Presentasi/default/index', 'id' => $data['id'],'page' => 1]); ?>" class="nav-link"><?php echo $data['title']; ?></a>
        </li>
        <?php endforeach; ?>
        
      </ul>  
    </nav>
    <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!-- <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light">MODUL ADDON</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrator</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
          <li class="nav-item">
            <a href="<?php echo  Url::to(['/Presentasi/default/index', 'id' => 1,'page' => 1]); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Modul 1
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo  Url::to(['/Presentasi/upload/upload']); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Modul 2
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo  Url::to(['/Presentasi/beli/index','id' => '1']); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Modul 3
              </p>
            </a>
          </li>

          
          <li class="nav-item">
            <a href="<?php echo  Url::to(['/site/login']); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Login
              </p>
            </a>
          </li>
      
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0 text-dark">Menu</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
       <?= $content ?>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019.</strong>
  </footer>
</div>
<!-- ./wrapper -->
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
