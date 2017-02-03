<?php
class Login extends mysqli
{
    private static $instance;

    public static function getInstance (){
        if (!self::$instance){

            self::$instance = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        }

        return self::$instance;
    }

    public $pass_hash;
    public function __construct($table = 'users', $id_rowName = 'id', $username_rowName = 'username', $password_rowName = 'password')
    {

        if(session_id() == '') {
            session_start();
//            $_SESSION['ID'] = '';
//            $_SESSION['KEY'] = '';
//            $_SESSION['IP'] = '';
//            $_SESSION['RIGHTS'] = '';
        }
        $this->table = $table;
        $this->id_rowName = $id_rowName;
        $this->username_rowName = $username_rowName;
        $this->password_rowName = $password_rowName;

        $this->db = $this->getInstance();
        if(version_compare(phpversion(), '5.5', '<=')){
            $this->pass_hash = 0;
        }else{
            $this->pass_hash = 1;
        }
    }



    public function loggedin()
    {
        if(!empty($_SESSION['ID'])){
        $userID = $_SESSION['ID'];
        $login_key = $_SESSION['KEY'];
        $loginIP = $_SESSION['IP'];
            if ($login_key !== '' && !empty($login_key) && !empty($userID) && !empty($loginIP) && $loginIP == $_SERVER["REMOTE_ADDR"]) {
                return 1;
            } else {
                return 0;
            }}else{return 0;}
    }
    public function logout($returnLocation = './'){
        $_SESSION['ID'] = '';
        $_SESSION['KEY'] = '';
        $_SESSION['IP'] = '';
        $_SESSION['RIGHTS'] = '';
        session_unset();
        session_destroy();
        header('location: ' . $returnLocation);
    }

    public function login($username, $password){
        $sql = "SELECT * FROM `" . $this->table . "` WHERE ". $this->username_rowName ." = '" . $username . "'";
        $result = $this->db->query($sql);
        if($result){
            $row = $result->fetch_assoc();
            $success = 0;
            switch ($this->pass_hash){

                case 1:
                    if(password_verify($password, $row[$this->password_rowName])){
                        $success = 1;
                    }else{
                        $success = 0;
                    }


                    break;

                case 0:
                    if(hash('whirlpool', $password) == $row[$this->password_rowName]){
                        $success = 1;
                    }else{
                        $success = 0;
                    }
                    break;
            }
//            var_dump(hash('whirlpool', $password) . " : " . $row[$this->password_rowName]);
//            var_dump(mysqli_error($this->db));
            if($success){
                $_SESSION['ID'] = $row['id'];
                $_SESSION['IP'] = $_SERVER["REMOTE_ADDR"];
                $login_key = hash('whirlpool', rand(0, 500));
                $_SESSION['KEY'] = $login_key;
                $_SESSION['RIGHTS'] = $row['rechten_id'];
                return 1;
            }else{
                return 0;
            }
        }else{
            return 0;
        }


    }

    public function register($voornaam, $achternaam, $password, $telefoon, $email, $username, $website, $type, $plaats){
        switch ($this->pass_hash){
            case 1:
                $password = password_hash($password, PASSWORD_DEFAULT);
                break;
            case 0:
                $password = hash('whirlpool', $password);
                break;
        }
        $sql = "SELECT id FROM $this->table WHERE $this->username_rowName='$username'";
        $result = $this->db->query($sql);
        if($result->num_rows==0) {

            $sql = "INSERT INTO `" . $this->table . "` (`voornaam` , `achternaam`,  `" . $this->password_rowName . "`, `telefoon`, `email`, `" . $this->username_rowName . "`, `website`, `type_id`, `plaats_id`, `rechten_id`) VALUES ('" . $voornaam . "','" . $achternaam . "','" . $password . "','" . $telefoon . "', '" . $email . " ','" . $username . "', '" . $website . "', '" . $type . "', '" . $plaats . "', '1')";
            $result = $this->db->query($sql);
            $id = $this->db->insert_id;
            $sql = "INSERT INTO `organisatie_pagina` (`eigenaar_id`, `titel`, `online`) VALUES ('" . $id . "', '" . $username . "', '0')";
            $result = $this->db->query($sql);

            if ($result){
                return 1;
            }else{
                return 0;
            }
        }else{
            return 2;
        }


    }
}