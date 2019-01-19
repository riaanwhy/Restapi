<?php


namespace app\controllers;
use Yii;
use yii\rest\ActiveController;
use yii\web\Response;
use app\models\Student;
class StudentController extends  ActiveController
{
	public $modelClass = 'app\models\Student';

  public function actionActiveUsers(){
      return Student::find()->where(['active' => 1])->all();
  }

  public function actionInactiveUsers(){
    return Student::find()->where(['active' => 0])->all();
}

  public function actionByname(){
       $userid = (String) $_GET['name'];
    return Student::find()->where(['Name' => $userid])->all();
  }
  
  public function actionByid(){
       $userid = $_GET['id'];
    return Student::find()->where(['id' => $userid])->all();
  }
}



