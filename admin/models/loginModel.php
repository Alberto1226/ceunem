<?php

class LoginModel extends Model
{
    private $email;
    private $pass;



    public function __construct()
    {
        parent::__construct();
    }

    public function userExits($email, $pass)
    {
        $this->email = $email;
        $this->pass = $pass;

        try {
            $query = $this->db->connect()->prepare('SELECT * FROM usuarios WHERE email = :email AND pass = :pass');
            $query->execute(['email' => $this->email, 'pass' => $this->pass]);

            $data = $query->fetch();
            return $data;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function sessionLogin( int $id_usu)
    {
        try {
            $query = $this->db->connect()->prepare('SELECT * FROM usuarios WHERE id_usu :id_usu');
            $query->execute(['id_usu' => $id_usu]);

            $data = $query->fetch();
            $_SESSION['userData'] = $data;
            return $data;
        } catch (PDOException $th) {
            return [];
        }
    }
}
