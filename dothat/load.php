<?php

// definition of DB connection
define('DB_HOST', 'localhost');
define('DB_PORT', '5432');
define('DB_PASSWD', 'your_db_password');
define('DB_USER', 'postgres');
define('DB_NAME', 'dothat');

// error array list
$errors = array(
		'db_conn' => null,
		'up' => [
			'username' => null,
			'email' => null,
			'password_1' => null,
			'password_2' => null,
			'password' => null,
			'db_query' => null
		],
		'in' => [
			'email' => null,
			'password' => null,
			'backup' => null
		]
	); 

// try to make connection with DB
try {
	$db = pg_connect('host='.DB_HOST.' port='.DB_PORT.' password='.DB_PASSWD.' user='.DB_USER.' dbname='.DB_NAME.'');
	if (!$db) {
		$errors['db_conn'] = 'DB refucing connection';
	}else{
		$errors['db_conn'] = null;		
	}
} catch (Exception $e) {
	$errors['db_conn'] = 'Caught exception: '.$e->getMessage();
}
function clean($string) {
$string = trim($string);
$string = stripslashes($string);
$string = htmlspecialchars($string);
return $string;
}
function enc($string){
  $encrypt_method = 'AES-256-CBC';
  $secret_key = 'U2FsdGVkX1+kUKGvV1ZWDEgvixMXVv0XKCnbpN16gDA=';
  $secret_iv = hash('sha256', $secret_key);
  $key = hash('sha256', $secret_iv);
  $initialization_vector = substr(hash('sha256', $secret_iv), 0, 16);
  $a = openssl_encrypt($string, $encrypt_method, $key, 0, $initialization_vector);
  return base64_encode($a);     
 }
function dec($string) {
  $encrypt_method = 'AES-256-CBC';
  $secret_key = 'U2FsdGVkX1+kUKGvV1ZWDEgvixMXVv0XKCnbpN16gDA=';
  $secret_iv = hash('sha256', $secret_key);
  $key = hash('sha256', $secret_iv);
  $initialization_vector = substr(hash('sha256', $secret_iv), 0, 16);
  return openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $initialization_vector);
}


if (isset($_POST['signup'])) {	
	$username = clean($_POST['identity']);
	$email = clean($_POST['enmail']);
	$password_1 = clean($_POST['enpw']);
	$password_2 = clean($_POST['cfpw']);
	unset($_SESSION['error_list']);

	if (empty($username)) { $errors['up']['username'] = "Username is required"; }
	if (empty($email)) { $errors['up']['email'] ="Email is required"; }
	if (empty($password_1)) { $errors['up']['password_1'] = "Password is required"; }
	if (empty($password_2)) { $errors['up']['password_2'] = "Password should confirm!"; }

	if ($password_1 != $password_2) {
		$errors['up']['password'] = "The two passwords do not match";
	}

	if (array_values($errors['up']) != null) {
		$hash_uname = enc($username);
		$hash_mail = enc($email);
		$hash_pw = enc($password_1);
		
		try {
			$query_begin = "begin";
			pg_query($db, $query_begin);
			$query_sql = "INSERT INTO users (username, email, password) VALUES('$hash_uname', '$hash_mail', '$hash_pw')";
			pg_query($db, $query_sql);
			$query_commit = "commit";
			pg_query($db, $query_commit);
			$_SESSION['username'] = $username;
		} catch (Exception $e) {
			$errors['up']['db_query'] = 'Caught exception: '.$e->getMessage();
			$_SESSION['error_list'] = $errors['up'];
			header('location: /');
		}
		header('location: /main/');
	}
	header('location: /');
	
}

if (isset($_GET['signin'])) {
	$email = clean($_GET['an']);
	$password = clean($_GET['pw']);
	unset($_SESSION['error_list']);
	if (empty($email)) {
		$errors['in']['email'] = "Email is required";
	}
	if (empty($password)) {
		$errors['in']['password'] = "Password is required";
	}
	if (array_values($errors['in']) != null) {
		$input = $password;
		$hash_mail = enc($email);
		$hash_pw = enc($input);
		try {
			pg_query($db, "begin");
			$query = "SELECT * FROM users WHERE email='$hash_mail' AND password='$hash_pw'";				
			$results = pg_query($db, $query) or die(pg_error($db));			
			pg_query($db, "commit");
		} catch (Exception $e) {
			$errors['in']['db_query'] = 'Caught exception: '.$e->getMessage();
			$_SESSION['error_list'] = $errors['in'];
			header('location: /');
		}
		if (pg_num_rows($results) == 1) {
			$row = pg_fetch_all($results);
			$user_info = array();
			foreach ($row as $key => $value) {
				array_push($user_info, $value);
			}
			$_SESSION['username'] = dec($user_info[0]['username']);
			header('location: /');
		}else {
			$errors['in']['backup'] = "Wrong email/password combination";
			$_SESSION['error_list'] = $errors['in'];
			header('location: /');
		}

	}
}

?>