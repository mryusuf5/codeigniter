<?php
class UserController extends CI_CONTROLLER{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usermodel');
        $this->load->helper("form");

        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
    }

    public function index()
    {
        echo "test<br/>";
    }

    public function CheckLogin(){
        print_r($this->Usermodel->LoginUser('86941@roc-teraa.nl','admin'));
    }

    public function AddStudent()
    {
        $json = file_get_contents("php://input");

        $data = json_decode($json);
        $result = [];
//        $field = [
//            "username" => $data->username,
//            "password" => $data->password
//        ];

        $res = $this->Usermodel->Login($data->username, $data->password);

        if($res == true)
        {
            $result["message"] = "succes";
        }
        else
        {
            $result["message"] = "fail";
        }
        echo json_encode($result);
//        $result ? $this->output->set_output(json_encode(["status"=>"succes"])) : $$this->output->set_output(json_encode(["status"=>"failed"]));
    }

    public function LoginStudent()
    {
        $json = file_get_contents("php://input");

        $inputData = json_decode($json);

        $result = [];
        $user = [];


        $user["user"] = $this->Usermodel->Login($inputData[0], $inputData[1]);

        if(count($user["user"]) == 1)
        {
            echo json_encode($user);
        }
        else if($user < 1 || $user > 1)
        {
            $result["message"] = "Gebruikersnaam of wachtwoord is onjuist.";
            echo json_encode($result);
        }
    }

    public function LoginTeacher()
    {
        $json = file_get_contents("php://input");

        $inputData = json_decode($json);

        $result = [];
        $teacher = [];


        $teacher["teacher"] = $this->Usermodel->LoginTeacher($inputData[0], $inputData[1]);

        if(count($teacher["teacher"]) == 1)
        {
            echo json_encode($teacher);
        }
        else if($teacher < 1 || $teacher > 1)
        {
            $result["message"] = "Gebruikersnaam of wachtwoord is fout.";
            echo json_encode($result);
        }
    }
}