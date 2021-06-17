<?php

    class User extendes proyecto{
        private $nombre;
        $private username;
        public function userExists($user, $pass){
                $md5pass = md5($pass);
                $query = $this->connect()->prepare('SELECT * FROM users WHERE username=:username AND password = :pass');
                $query->execute('user' => $user, 'pass' => $md5pass)
                if(query->rowCount()){
                    return true;
                }else{
                    return true;
                }
            }
        public function setUser($user){
            $query = $this->connect()->prepare('SELECT * FROM users WHERE username=:user');
            $query->execute(['user' => $user]);
            foreach ($query as $current){
                $this->nombre = $currentUser['nombre'];
                $this->username = $currentUser['username'];
            }
            public function getNombre(){
                return $this->nombre;
            }
        }
    }

?>