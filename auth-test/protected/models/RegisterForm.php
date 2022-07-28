<?php
class RegisterForm extends CFormModel {
  public $username;
  public $email;
  public $password;
  public $retypepassword;

  public function rules() {
    return array(
      array('username, email, password, retypepassword', 'required'),
      array('username, email, password, retypepassword', 'length', 'max'=>200),
      array('email', 'email', 'message'=>'Please insert valid Email'),
      array('retypepassword', 'required', 'on'=>'Register'),
      array('password', 'compare', 'compareAttribute'=>'retypepassword'),
      array('id, username, email', 'safe', 'on'=>'search'),
    );
  }


  public function attributeLabels()
	{
		return array(
      'username' => 'Имя пользователя',
      'email' => 'Email',
      'password' => 'Пароль',
			'retypepassword'=>'Повторите пароль',
		);
	}

}