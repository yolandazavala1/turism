<?php
    class UserSession{
        public function _construct(){
            session_start();
        }
        public function setCurrentUser($user){
            $_SESSION['user']= $user;
        }
        public function getCurrentUser($user){
            $_SESSION['user'];
        }
        public function closeSession(){
            session_unset();
            ssession_destroy();
            
        }
    }
?>