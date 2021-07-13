<?php


class Register extends Controller
{

    public function __construct()
    {
        $this->reg = $this->model("RegisterM");
    }


    public function index()
    {
        $this->view("users/register");
    }

    public function insert()
    {
        $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($d = $this->reg->insert($data)) {
                echo json_encode($d);
            } else {
                echo json_encode(['Ref' => "empty fields"]);
            }
        }
    }
}
