<?php
error_reporting(1);
class Update
{
    private $itemid;
    private $status_;

  public function updateTodo(){
       try {
        if ($this->validate() == true && $this->checkEmpty() ==true) {
            $this->itemid = $_POST['itemid'];
            $this->status_ = $_POST['status'];
            $data = array(
                'itemid'=>$this->itemid,
                'status_'=>$this->status_
            );
            include('UpdateModel.php');
            $model = new UpdateModel();
            $res = $model->process($data);
            return $res;

         } else{
            $feedback = array(
                'msg' => "Invalid data!. The due date and Task are required.",
            );
            return $feedback;

         }
       } catch (\Throwable $e) {
        $feedback = array(
            'msg' => "Something went wrong!",
        );
        return $feedback;

       }
    }

public function validate(){
    if (isset($_POST['itemid']) && isset($_POST['status'])) {
        return true;
    }else{
        return false;
    }

}

public function checkEmpty(){
    if (!empty($_POST['itemid']) && !empty($_POST['status'])) {
        return true;
    }else{
        return false;
    }
}
    
}

$class = new Update();
$result = $class -> updateTodo();
echo json_encode($result);