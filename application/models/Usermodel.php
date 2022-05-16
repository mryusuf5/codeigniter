<?php
class Usermodel extends CI_Model{
    public function getUsers(){
        return $this->db->query("SELECT * FROM `users`;")->result();
    }
    public function LoginUser($email, $password){
        return $this->db->query("SELECT * FROM `users` WHERE `users`.`email` = '$email' LIMIT 1")->result();
    }

    public function Login($username, $password)
    {
        return $this->db->query("SELECT * FROM students WHERE student_email = '$username' AND student_password = '$password'")->result();
    }

    public function LoginTeacher($username, $password)
    {
        return $this->db->query("SELECT * FROM teachers WHERE teacher_email = '$username' AND teacher_password = '$password'")->result();
    }

    public function GetTeachersField()
    {
//        return $this->db->query("SELECT * FROM teachers WHERE ")
    }

}