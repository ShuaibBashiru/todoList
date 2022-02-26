<?php
include('Database.php');
class GetTodo extends Database{
    public function data(){
        if($this->connect()){
            $db = new Database();
            $conn = $db->connect();
            
            $sql = "SELECT * FROM todolist_tbl ORDER BY due_date DESC";
            $result = $conn->query($sql);
           
            $json_array = array();

            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    $json_array[] = $row; 
                }
                $feedback = array(
                    'msg' => "Success",
                    'result' => $json_array
                );
                return $feedback;
            }{
                $feedback = array(
                    'msg' => "No record(s) found",
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

$class = new GetTodo();
$result = $class -> data();
echo json_encode($result);