<?php

// if( !defined( __DIR__ ) ) define( __DIR__, dirname(__FILE__) );
// require_once( __DIR__ . '/../../vendor/autoload.php');

class GoogleAuth{

 
	protected $client;
	

	
	public function __construct(Google_Client $googleClient = null){

		

		$this->client = $googleClient;
		

		if($this->client){


			$this->client->setClientId('673422047232-u8iooe1i72vv3tq3i2njujmro8b2lame.apps.googleusercontent.com');
			$this->client->setClientSecret('_Mvob7wLDoPNbjEnwPuvXTXl');
			$this->client->setRedirectUri('http://localhost/test/');
			$this->client->setScopes('https://www.googleapis.com/auth/plus.login');
			$this->client->setScopes('https://www.googleapis.com/auth/plus.me');
		}








	}

	public function isLoggedIn(){

		return isset($_SESSION['access_token']);
	}

	public function getAuthUrl(){
		return $this->client->createAuthUrl();
	}

	public function checkRedirectCode(){
		if(isset($_GET['code'])){

			$this->client->authenticate($_GET['code']);

			$this->setToken($this->client->getAccessToken());

			return true;

		}

		return false;
	}


	public function setToken($token){

		$_SESSION['access_token'] = $token;
		$this->client->setAccessToken($token);

	}

	public function logout(){

		unset($_SESSION['access_token']);
	}











	
		
	 
	   

    }








