<?php
    function login(){
        $email=$_POST['username'];
        $password=$_POST['password'];
        if(($email =='admin@sliit.lk')&&($password=='sliit@123456')){
            echo"success login";
            session_set_cookie_params(3600);
            session_start();
            session_regenerate_id();

            $cookie = 'user_cookie';
            $session_id=session_id();
            setcookie($cookie,$session_id,time()+3600,'/');

            $token= generateTokenVal();
            $_SESSION['CSRF_Token'] = $token;
            echo $token;
            header('Location:user.php');
            exit;
        } else {
            echo'<script> document.getElementById("notice").style.display = "block";</script>';
        }
    }

    function generateTokenVal(){
        $tokneId = hash_hmac('sha256',"Lakma Madumadavi on Synchronizer Tokens",bin2hex(random_bytes(32)));
        return $tokneId;
    }
?>