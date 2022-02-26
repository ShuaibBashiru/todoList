<?php
class Create
{
    public $task;
    public $dueDate;
    public $created_at;
    public $status_;

  public function createTodo($task){
       try {
        $task = $_POST['task'];
        // $task = $this->function_filter_hook($task);
        $this->task = $task;
        $this->dueDate = $_POST['dueDate'].' '.date('h:i:s');
        $this->created_at = date('Y-m-d h:i:s');
        $this->status_ = 'New';
        
        if ($this->checkEmpty() ==true) {
            $data = array(
                'task'=>$this->task,
                'due_date'=>$this->dueDate,
                'created_at'=>$this->created_at,
                'status_'=>$this->status_
            );
            include('CreateModel.php');
            $model = new CreateModel();
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
            'Error' => $e->getMessage(),
        );
        return $feedback;

       }
    }

public function checkEmpty(){
    if (strlen($this->task)>0 && strlen($this->dueDate)>0) {
        return true;
    }else{
        return false;
    }
}

// Stock here, need to reroute.
public function function_filter_hook($task){
    add_filter('the_content', 'createTodo');
    apply_filters("the_content", "hello");
}

    
}


$class = new Create();
$result = $class -> createTodo($task);
echo json_encode($result);

