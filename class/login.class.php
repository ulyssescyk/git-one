<?php

class Login extends Dbh {
	protected $uid;
	protected $pwd;
	
	
	protected function getUser($uid,$pwd){
		$stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? ;');
		
		if(!$stmt->execute(array($uid))){
			$stmt = null;
			header("location:../index.php?error=stmtfailedincheck");
			exit();
		}
		
		
		if($stmt->rowCount()==0){
			$stmt = null;
			header("location:../index.php?error=usernotfound");
			exit();
		}
		
        $pwdHash = $stmt->fetchALL(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd,$pwdHash[0]["users_pwd"]);

        if(!$checkPwd){
			$stmt = null;
			header("location:../index.php?error=wrongpassword");
			exit();

		}elseif($checkPwd){
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? ;');
            if(!$stmt->execute(array($uid))){
                $stmt = null;
                header("location:../index.php?error=usernotfound");
                exit();
            }

            if($stmt->rowCount()==0){
                $stmt = null;
                header("location:../index.php?error=usernotfound");
                exit();
            }
            echo "get user id";
            $user = $stmt->fetchALL(PDO::FETCH_ASSOC);
            session_start();
            echo "session started after login";
            $_SESSION["useruid"] = $user[0]["users_uid"];
            //$_SESSION["useruid"] = $user[0]["user_uid"];

        }
		$stmt = null;
	}
	

}



?>