<?php


class rendezVousM
{

    public $table = "rendez-v";
    public $conn;
    public function __construct()
    {
        $this->conn = new Database();
    }

    public function readAll($data)
    {
        $query = "SELECT * FROM `$this->table` WHERE reference_id =:Ref";
        $this->conn->query($query);
        $this->conn->bind(":Ref",$data->Ref);
        $stm = $this->conn->resultSet();

        return $stm;
    }
    public function read_single($data)
    {
        $query = "SELECT * FROM `$this->table` WHERE id=:id";
        $stmt = $this->conn->query($query);

        $this->conn->bind(":id", $data->id);

        $stm = $this->conn->single();

        return $stm;
    }

    public function checkTime($data)
    {
        $query = "SELECT  time FROM `$this->table` WHERE Date =:R_date ";
        $stm = $this->conn->query($query);
        $this->conn->bind(":R_date", $data->Date);
        // $this->conn->bind(":R_time", $data->time);
        // $this->conn->single();
        
     
        return $this->conn->resultSet();
    }
    public function insert($data)
    {
        $query = "INSERT INTO `$this->table` (Date,time,reference_id,typeDeConsultaion) VALUES(:Date,:time,:reference_id,:typeDeConsultaion)";
        $this->conn->query($query);
        $this->conn->bind(":Date", $data->Date);
        $this->conn->bind(":time", $data->time);
        $this->conn->bind(":reference_id", $data->reference_id);
        $this->conn->bind(":typeDeConsultaion", $data->typeDeConsultaion);
        if ($this->conn->execute())
            return true;
        return false;
    }

    public function delete($data)
    {
        $query = "DELETE  FROM `$this->table` WHERE id = :id ";
        $this->conn->query($query);

        $this->conn->bind(":id", $data->id);

        if ($this->conn->execute())
            return true;
        return false;
    }

    public function update($data)
    {
        $query = "UPDATE `$this->table` SET Date=:Date , time =:time, typeDeConsultaion = :typeDeConsultaion WHERE id=:id";
        $this->conn->query($query);

        $this->conn->bind(":id", $data->id);
        $this->conn->bind(":Date", "$data->Date");
        $this->conn->bind(":time", "$data->time");
        $this->conn->bind(":typeDeConsultaion", "$data->typeDeConsultaion");
        // $this->conn->bind(":reference_id",$data->reference_id);

        if ($this->conn->execute())
            return true;
        return false;
    }
}
