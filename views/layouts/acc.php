
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
                    <?php           $usr =    User::findOne(Yii::$app->user->id);?>
                                 
  <?php
$items  /* some items */;
if (!Yii::$app->user->isGuest && $usr->st ==1) {
    $items[] =['label' => 'Profile', 'url' => ['nasabah/profile']];
    $items[] =  ['label' => 'BangSampah', 'url' => ['nasabah/member']];
   $items[] = ['label' => 'Laporan', 'url' => ['transaksi-nasabah/index']];
     $items[]=(
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            );


} else if (!Yii::$app->user->isGuest && $usr->st ==2)  {
    $items[] = ['label' => 'Lembaga', 'url' => ['lembaga/profile']];             
    $items[]= ['label' => 'Home', 'url' => ['/site/index']];
    $items[]=(
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            );

}

            

    NavBar::begin([
        'brandLabel' => "Jangkar Sampah",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' =>$items
    ]);
    NavBar::end();
    ?>