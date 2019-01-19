<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

use backend\modules\madmin\models\Nasabah;
use dektrium\user\models\User;

?>
<?php


/* @var $this \yii\web\View */
/* @var $content string */

use backend\modules\madmin\models\Nasabah;
use dektrium\user\models\User;

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
?>

<div class="wrap">
  <?php
    NavBar::begin([
        'brandLabel' => "Jangkar Sampah",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
               
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                
            )
        ],
    ]);
    NavBar::end();
    ?>
</div>





<header class="hero">
    <div class="hero-wrapper">
        <div class="secondary-navigation">
            <div class="container">
                <ul class="left">
                    <li>
                    <span>
                        <i class="fa fa-phone"></i>info@jangkarsampah.id
                    </span>
                    </li>
                </ul>
                <!--end left-->
                <ul class="right">
                    <li>
                         <?php if (Yii::$app->user->isGuest) { ?>
                        <?php echo Html::a('<i class="fa fa-fw  fa-sign-in"></i> Login', ['/login/index'])?>
                        <?php echo Html::a('<i class="fa fa-pencil-square-o"></i> Register ', ['/register/index'])?>
                        <?php } else { ?>
                        <?php echo Html::a('<i class="fa fa-fw  fa-sign-out"></i> Sign out ', ['/site/logout'], ['data-method' => 'post']) ?>
                        <?php } ?>
                    <li>
                </ul>
                <!--end right-->
            </div>
            <!--end container-->
        </div>
        <div class="main-navigation">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                  
                    <div class="navbar-expand" id="navbar">
                        <!--Main navigation list-->
                        <ul class="navbar-nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                             <?php if (Yii::$app->user->isGuest) { ?>
                                 <li class="nav-item active has-child">
                                        <a class="nav-link" href="#">Register</a>
                                        <ul class="child">
                                            <li class="nav-item">
                                                
                                                 <?php echo Html::a('Sebagai Nasabah', ['register/nasabah'],['class' => 'nav-link']); ?>
                                            </li>
                                            <li class="nav-item">
                                             <?php echo Html::a('Sebagai Bank sampah
                                             ', ['register/bsampah'],['class' => 'nav-link']); ?>
                                            </li>
                                        </ul>
                                    </li>
                                    <?php }?>
                                <li class="nav-item">
                     <?php           $usr =    User::findOne(Yii::$app->user->id);?>
                                <?php if (!Yii::$app->user->isGuest  && $usr->st == 1) { ?>
                                 <li class="nav-item ">
                                      <?php echo Html::a('Profile', ['nasabah/profile'],['class' => 'nav-link']); ?>
                                </li>
                                  <li class="nav-item ">
                                   
                                    <?php echo Html::a('Bang sampah', ['nasabah/member'],['class' => 'nav-link']); ?>
                                </li>
                                  <li class="nav-item ">
                                   
                                    <?php echo Html::a('Laporan Transaksi', ['transaksi-nasabah/index'],['class' => 'nav-link']); ?>
                                </li>
                                <?php } ?>
                                </li>
                                  <li class="nav-item">
                     <?php           $usr =    User::findOne(Yii::$app->user->id);?>
                                <?php if (!Yii::$app->user->isGuest  && $usr->st == 2) { ?>
                                 <li class="nav-item ">
                                      <?php echo Html::a('Profile', ['lembaga/profile'],['class' => 'nav-link']); ?>
                                </li>
                                
                                     <li class="nav-item active has-child">
                                        <a class="nav-link" href="#">Nasabah</a>
                                        <ul class="child">
                                            <li class="nav-item">
                                              
                                    <?php echo Html::a('Pengajuan', ['lembaga/member'],['class' => 'nav-link']); ?>    
                                            </li>
                                            <li class="nav-item">
                                          

                                    <?php echo Html::a('Aktif', ['lembaga/maktif'],['class' => 'nav-link']); ?>
                                            </li>
                                        </ul>
                                    </li>


                                  <li class="nav-item ">
                                   
                                    <?php echo Html::a('Transaksi', ['transaksi-nasabah/bs'],['class' => 'nav-link']); ?>
                                </li>

                                 <li class="nav-item active has-child">
                                        <a class="nav-link" href="#">Laporan</a>
                                        <ul class="child">
                                            <li class="nav-item">
                                              
                                    <?php echo Html::a('Transaksi master', ['laporan/lap'],['class' => 'nav-link']); ?>    
                                       <br>
                                            </li>
                                            <br>
                                            <li class="nav-item">
                                          

                                    <?php echo Html::a('Transaksi Detail', ['laporan/lapdetail'],['class' => 'nav-link']); ?>
                                            </li>
                                            <br>
                                            <li class="nav-item">
                                          

                                    <?php echo Html::a('Input Rekap', ['laporan/rekapget'],['class' => 'nav-link']); ?>
                                            </li>
                                        </ul>
                                    </li>
                                <?php } ?>
                                </li>

                            </li>
                        </ul>
                        <!--Main navigation list-->
                    </div>
                    <!--end navbar-collapse-->
                </nav>
                <!--end navbar-->
            </div>
            <!--end container-->
        </div>
    </div>
</header>