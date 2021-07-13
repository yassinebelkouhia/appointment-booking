<?php


class rendezVous extends Controller
{
    public function __construct()
    {
        $this->rendezV = $this->model("rendezVousM");
    }



    public function readAll()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents("php://input"));

            $headers = apache_request_headers();

            $headers = $headers['authorization'] ? explode(" ", $headers['authorization']) : '';

            if (count($headers) == 1) {
                echo json_encode(["response" => "redirect"]);
            } else {
                if ($this->rendezV->readAll($data))
                    echo json_encode($this->rendezV->readAll($data));
            }
        }
    }
    public function read_single()
    {
        $data = json_decode(file_get_contents("php://input"));
        // die(var_dump($data));
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->rendezV->read_single($data))
                echo json_encode($this->rendezV->read_single($data));
        }
    }

    public function checkTime()
    {
        $data = json_decode(file_get_contents("php://input"));
        if ($this->rendezV->checkTime($data)) {
            echo json_encode($this->rendezV->checkTime($data));
        }
    }
    public function insert()
    {

        $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->rendezV->insert($data)) {
                echo json_encode(["Success", "Created Successfully"]);
            }
        }
    }

    public function delete()
    {
        $data = json_decode(file_get_contents("php://input"));
        if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
            if ($this->rendezV->delete($data)) {
                echo json_encode(['Success' => 'appointment deleted']);
            }
        }
    }


    public function update()
    {
        $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            if ($this->rendezV->update($data)) {
                echo json_encode(['Success' => 'data has updated']);
            }
        }
        // } else {
        //     echo json_encode("exist");
        // }
    }
}
