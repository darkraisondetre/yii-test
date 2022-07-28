<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'users'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'profile'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionUpdate()
	{
		$model = $this->loadModel(Yii::app()->user->id);
		$rnd = rand(0 , 9999);

		if(isset($_POST['User']))
		{
			$model->attributes = $_POST['User'];
			$model->about_user = $_POST['User']['about_user'];

			$uploadedFile = CUploadedFile::getInstance($model, 'image');
			$fileName = "{$rnd}-{$uploadedFile}";
			if(!empty($uploadedFile))
			$model->image = $fileName;
			
			if($model->save()) {
				if(!empty($uploadedFile))
				$uploadedFile->saveAs(Yii::app()->basePath.'/../images/'.$fileName);
				$this->redirect(array('/user/profile'));
			}
		}
	}

	public function actionView($id) {
		$user_model = $this->loadModel($id);
		$comments_model = new Comments();
		$comments = Comments::model()->findAll("t.profile_id = $id");

		if(isset($_POST['Comments']))
		{
			$comments_model->author_id = Yii::app()->user->id;
			$comments_model->id = $id;
			$comments_model->comment = $_POST['Comments']['comment'];
			if($comments_model->save()) {
				$this->redirect(array("/user/$id"));
			}
		}

		$this->render('view' ,array(
			'user_model' => $user_model,
			'comments_model' => $comments_model,
			'comments' => $comments
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');

		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionProfile()
	{
		$this->render('profile', array(
			'model' => $this->loadModel(Yii::app()->user->id)
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin' ,array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
