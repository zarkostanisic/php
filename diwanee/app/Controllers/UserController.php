<?php 
	namespace App\Controllers;

	use \App\Models\User;
	use \App\Core\Session;

	class UserController{
		// Login page
		public function loginForm(){
			// If user is logged redirect to admin
			if(Session::isLogged()) redirect('/admin');

			$title = "Login";

			return view('login', compact('title'));
		}

		// User login
		public function login(){
			$errors = array();

			$email = trim($_POST['email']);
			$password = trim($_POST["password"]);

			// Validate if email and password are empty
			if(empty($email) || empty($password)) $errors[] = 'Email and password are required';
			else{
				$password = md5($password);

				// Check if user with email and pasword exists.
				if($user = User::exist($email, $password)){
					Session::set('id', $user['id']);
					Session::set('email', $user['email']);

					// Redirect to admin
					return redirect('/admin');
				}else {
					$errors[] = "User not exist";
				}
			}
			

			return view('login', compact('errors', 'email'));
		}

		// Register page
		public function registerForm(){
			// If user is logged redirect to admin
			if(Session::isLogged()) redirect('/admin');

			$title = "Register";

			return view('register', compact('title'));
		}

		// User register
		public function register(){
			$errors = array();

			$email = trim($_POST['email']);
			$password = trim($_POST["password"]);
			$confirm_password = trim($_POST["confirm_password"]);

			// Validation
			if(empty($email)) $errors[] = 'Email is required';
			else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Enter valid email";
			else if(User::emailExist($email)) $errors[] = "User with this email already exists";

			if(empty($password)) $errors[] = 'Password is required';
			else if($password != $confirm_password) $errors[] = 'Password must be same';

			if(count($errors) == 0) {
				$password = md5($password);
				
				// Create new user
				if($id = User::create($email, $password)){
					Session::set('id', $id);
					Session::set('email', $email);

					// Redirect to admin
					return redirect('/admin');
				}
			}
			

			return view('register', compact('errors', 'email'));
		}

		// User logout
		public function logout(){
			Session::destroy();

			// Redirect to home page
			return redirect('/');
		}
	}
 ?>