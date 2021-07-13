<?php


class loginM
{

    public $table = "users";
    public $conn;

    public function __construct()
    {
        $this->conn = new Database();
    }


    public function chechRef($data)
    {
        $query = "SELECT Reference FROM $this->table WHERE Reference=:Reference ";

        $stmt = $this->conn->query($query);
        $this->conn->bind(":Reference", $data->ref);
        $this->conn->execute();
        $row = $this->conn->rowCount();

        return $row;
    }
}
