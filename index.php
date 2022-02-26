
<?php get_header(); ?>

    <div class="row d-flex justify-content-center">
            <div class="col-md-7">
            <div class="m-1">
                <h1 class="display-6 text-white">To-Do Lists</h1>
            </div>
            </div>
    </div>


    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
        <div class="border m-1 p-2 bg-white rounded-top rounded-bottom">

        <form @submit.prevent="createTodo">
            <div class="input-group">
            <input type="text" name="" id="" class="form-control" v-model="formData.task" placeholder="What is to be done?" required>
            <input type="date" class="d-none" id="date" v-model="formData.dueDate" required @change="buttonClick">
            <label for="date" title="Due date is required to set notification" class="input-group-text btn btn-outline-primary">Due date <i class="bi-calendar"></i></label>
            </div>

            <div class="row">
                <div class="col">
                <div class="mt-1 d-flex justify-content-start">
                  <span> <small> {{due_date}} </small> </span>
                </div>
                </div>
                <div class="col">
                <div class="mt-1 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary" @click="buttonClick"> {{this.submit}} <i class="bi-plus-circle"></i></button>
                </div>
                </div>
            </div>

        </form>
        </div>
        </div>

    </div>


    <div class="row d-flex justify-content-center" v-if="alert!=''">
        <div class="col-md-7">
        <div class="border m-1 p-2 bg-white rounded-top rounded-bottom">
        <div class="alert alert-primary border-0 text-center m-0 p-2">{{alert}}</div>
        </div>
        </div>
    </div>



    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="border m-1 p-2 bg-white rounded-top rounded-bottom">
                <ul class="list-group">
                    <li class="list-group-item" v-for="(item, index) in taskList" :key="index" :title="item.task">
                        <div class="row">
                            <div class="col"> <small class="text-" style="font-size:9pt"> <em><i class="bi-alarm"></i> Created on: {{item.created_at}}</em> </small> <br/> 
                             <span v-if="item.status_=='Completed'">
                              <label :for="item.id" class="text-primary"> <del> {{item.task}} </del> <i class="bi-check text-primary"></i> </label> 
                            </span>
                            <span v-else-if="item.status_=='Canceled'">
                              <label :for="item.id" class="text-primary"> <del class="text-danger"> {{item.task}} </del> <i class="bi-x text-danger"></i> </label> 
                            </span>
                            <span v-else>
                              <label :for="item.id" class="text-primary">  {{item.task}} </label> 
                            </span> <br/>
                            <small class="text-" style="font-size:9pt"> <em><i class="bi-alarm"></i> Due on: {{item.due_date}}</em> </small> 
                        </div>

                            <div class="col-2">
                            <span v-if="item.status_=='New'"> 
                            <div class="row">
                                <div class="col"><i class="bi-check-circle text-primary float-end" title="Mark as completed" @click="updateStatus(item.id, 'Completed')"></i></div>
                                <div class="col"><i class="bi-x-circle text-danger float-end" title="Cancel this task" @click="updateStatus(item.id, 'Canceled')"></i></div>
                                </div>
                            </span>

                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <h1 class="display-6 mt-5 text-white text-center" style="font-size:12pt;"><em>Designed for Decagon</em></h1>
        </div>
    </div>


    <?php get_footer(); ?>
