<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: * ');


class RegisterM
{
    public $table = "user";
    public $conn;
    public function __construct()
    {
        $this->conn = new Database();
    }

    public function uniqidReal($lenght = 7)
    {
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }

    public function insert($data)
    {

        if (!empty($data->FirstName) && !empty($data->LastName) && !empty($data->Age) && !empty($data->Email) && !empty($data->tel)) {
            
            $query = "INSERT INTO $this->table(Reference,FirstName,LastName,Age,Email,tel) VALUES(:Reference,:FirstName,:LastName,:Age,:Email,:tel)";
            $ref = strtoupper($this->uniqidReal());
            $this->conn->query($query);


            $this->conn->bind(":Reference", $ref);
            $this->conn->bind(":FirstName", $data->FirstName);
            $this->conn->bind(":LastName", $data->LastName);
            $this->conn->bind(":Age", $data->Age);
            $this->conn->bind(":Email", $data->Email);
            $this->conn->bind(":tel", $data->tel);


            if ($this->conn->execute())
                return $ref;
            return false;
        }
        else
        {
            return "empty";
        }
    }
}
