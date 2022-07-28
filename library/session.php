<?php
class session{
    public static function checksession(){
        if(session_id()==='') session_start();
        if(!isset($_SESSION['isLogin'])){
            session_destroy();
            header('Location:loginUser.php');
        }
    }
    public static function checkLogin(){
        if(session_id()==='') session_start();
        if(isset($_SESSION['isLogin'])){
            header('Location:index.php');
        }
    }
}