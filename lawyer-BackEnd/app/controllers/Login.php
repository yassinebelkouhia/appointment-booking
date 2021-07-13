<?php 


    class Login extends Controller {

        public function __construct()
        {
            $this->log = $this->model("loginM");
        }


        // public function index()
        // {
        //     $this->view("users/login");
        // }


        public function checkRef()
        {
            $data = json_decode(file_get_contents("php://input"));

            if ($this->log->chechRef($data) > 0){
                echo json_encode(['token' => $this->generateToken()]);
            }
            else
            {
                echo json_encode(['token' => 'is invalid']);
            }
        }


    }











?>