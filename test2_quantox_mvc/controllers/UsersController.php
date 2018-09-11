<?php 

	class UsersController{
		//result list
		public function result(){
			$title = 'Result';

			if(isset($_GET['q'])){
				$query = $_GET['q'];

				$users = User::result($query);
				
				view('user/result', compact('users', 'title'));
			}else{
				redirect(route('/'));
			}
		}

		//show register form
		public function register(){
			$title = 'Register';

			if(Session::isLogged()) redirect(route('/'));

			view('user/register', compact('title'));
		}

		//create a user
		public function create(){
			$name = trim($_POST['name']);
			$email = trim($_POST['email']);
			$password = trim($_POST['password']);
			$password_confirm = trim($_POST['password_confirm']);


			$errors = array();

			if($name == '') $errors[] = 'Name is required';
			if($email == '') $errors[] = 'Email is required';
			if ($email != '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			    $errors[] = 'Invalid email address';
			}
			if($password == '') $errors[] = 'Password is required';
			if($password != '' && $password != $password_confirm){
				$errors[] = 'Passwords not same';
			}
			if(User::check($email)) $errors[] = 'Email "' . $email . '" already taken';

			if(count($errors)){
				Session::set('errors', $errors);

				$this->register();
			}else{
				$password = md5($password);
				
				if(User::create($name, $email, $password)){
					$this->check();
					
					redirect(route('/'));
				}
			}
		}

		//show a login form
		public function login(){
			$title = 'Login';

			if(Session::isLogged()) redirect(route('/'));
			view('user/login', compact('title'));
		}

		//if user exist login it
		public function check(){

			$email = trim($_POST['email']);
			$password = md5(trim($_POST['password']));

			$errors = [];

			$user = User::get($email, $password);

			if($user == false){
				$errors[] = 'Incorect email or password';

				Session::set('errors', $errors);

				$this->login();
			}else{
				Session::set('id', $user['id']);
				Session::set('name', $user['name']);
				Session::set('email', $user['email']);

				redirect(route('/'));
			}
		}

		//logout
		public function logout(){
			Session::destroy();

			redirect(route('/'));
		}
	}
 ?>