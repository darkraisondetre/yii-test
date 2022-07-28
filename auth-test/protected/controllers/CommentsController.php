<?php

class CommentsController extends Controller
{
    public function actionIndex()
    {
      $this->render('index');
    }

    public function actionCreate($id)
    {
      $model = new Comments();

      if(isset($_POST['Comments']))
      {
        $model->author_id = Yii::app()->user->id;
        $model->profile_id = $id;
        $model->comment = $_POST['Comments']['comment'];
        if($model->save()) {
          $this->redirect(array("/user/$id"));
        }
      }
    }

}