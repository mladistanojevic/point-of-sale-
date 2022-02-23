<?php

class User
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll($user_id)
    {
        $stmt = $this->db->query("SELECT * FROM users WHERE user_id != :user_id");
        $stmt->execute(array(
            ':user_id' => $user_id
        ));
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function getUserByEmail($email)
    {
        $stmt = $this->db->query("SELECT * FROM users WHERE email = :email");
        $stmt->execute(array(
            ':email' => $email
        ));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return $user;
        }

        return false;
    }

    public function register($data)
    {
        $stmt = $this->db->query("INSERT INTO users (username,email,password,date,role,gender) VALUES (:username,:email,:password,:date,:role,:gender)");
        if ($stmt->execute(array(
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':password' => $data['password'],
            ':date' => $data['date'],
            ':role' => $data['role'],
            ':gender' => $data['gender']
        ))) {
            return true;
        }

        return false;
    }

    public function login($data)
    {
        $stmt = $this->db->query("SELECT * FROM users WHERE email = :email");
        $stmt->execute(array(
            ':email' => $data['email']
        ));
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        if (!$user) {
            return false;
        }

        $hashedPassword  = $user->password;
        if (password_verify($data['password'], $hashedPassword)) {
            return $user;
        } else {
            return false;
        }
    }
}
