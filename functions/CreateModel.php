<?php
include('Database.php');
class CreateModel extends Database{
    public function process($data){
        if($this->connect()){
            $db = new Database();
            $conn = $db->connect();
            
            $sql = "INSERT INTO todolist_tbl(task, due_date, created_at, status_) VALUES(?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $data['task'], $data['due_date'], $data['created_at'], $data['status_']);
            $res = $stmt->execute();
           
            if($res){
                $feedback = array(
                    'msg' => "New task added successfully",
                );
                return $feedback;
            }{
                $feedback = array(
                    'msg' => "Something went wrong! unable to insert record.",
                );
                return $feedback;

            }


        }else{
            $feedback = array(
                'msg' => "Failed to connect to server",
            );
            return $feedback;

        }

    }
}