<?php
include('Database.php');
class UpdateModel extends Database{
    public function process($data){
        if($this->connect()){
            $db = new Database();
            $conn = $db->connect();
            
            $sql = "UPDATE todolist_tbl SET status_=? where id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $data['status_'], $data['itemid']);
            $res = $stmt->execute();
           
            if($res){
                $feedback = array(
                    'msg' => "Task updated successfully",
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