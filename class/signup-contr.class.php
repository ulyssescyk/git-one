<?php

class SignupContr extends Signup {
	protected $uid;
	protected $pwd;
	protected $pwdRepeat;
	protected $email;
	
	public function __construct($uid,$pwd,$pwdRepeat,$email){
	
		$this->uid=$uid;
		$this->pwd=$pwd;
		$this->pwdRepeat=$pwdRepeat;
		$this->email=$email;
	
	}

	public function signupUser(){
		if(!$this->emptyInput()){
			// echo "Empty input!";
			header("location:../index.php?error=emptyInput");
			exit();
		}
		if(!$this->invalidUid()){
			// echo "invalid username!";
			header("location:../index.php?error=username");
			exit();
		}
		if(!$this->invalidEmail()){
			// echo "invalid email!";
			header("location:../index.php?error=email");
			exit();
		}
		if(!$this->pwdmatch()){
			// echo "invalid password!";
			header("location:../index.php?error=pwd");
			exit();
		}
		if(!$this->uidTakenCheck()){
			// echo "Username or email taken!";
			header("location:../index.php?error=usernameoremialtaken");
			exit();
		}

		$this->setUser($this->uid,$this->pwd,$this->email);
	}
	
	
	private function emptyInput(){
		$result;
		if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)){
			$result =false;
			
		}else{$result=true;}
		return $result;
	}
	
	private function invalidUid(){
		$result ;
		if(!preg_match("/^[a-zA-Z0-9]*$/",$this->uid)){
			$result = FALSE;
		}else{$result= true;}
		return $result;
	}
	private function invalidEmail(){
		$result ;
		if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
			$result =false;
			
		}else{$result=true;}
		return $result;
	}
	private function pwdmatch(){
		$result ;
		if($this->pwd!== $this->pwdRepeat){
			$result =false;
			
		}else{$result=true;}
		return $result;
	}

	private function uidTakenCheck(){
		$result ;
		if(!$this->checkUser($this->uid,$this->email)){
			$result =false;
			
		}else{$result=true;}
		return $result;
	}

}



?>