new Vue({
    el: "#todo",
        data:{
           url: '',
           name: 'test',
           alert: '',
           taskList: [],
           submit: 'Add',
           due_date: '',
           formData:{
               task: '',
               dueDate: '',
           }
        },

        created(){
            this.getTodo()
            this.url = document.querySelector('meta[name="directory_uri"]').content
            // alert(this.url);
        },

    methods: {
        buttonClick: function(){
                if (this.formData.dueDate.length < 3) {
                    this.alert = "Please choose a due date"
                }else{
                    this.alert = ""
                    this.due_date = "Due date: "+this.formData.dueDate
                    return false;
                }
        },
        createTodo: function(){
            var url = document.querySelector('meta[name="directory_uri"]').content;
            this.submit='Adding... '
            var form_data = new FormData();
            var forms = this.formData
            for (var key in forms){
                form_data.append(key, this.formData[key])
            }
            axios.post(url+'/functions/create.php', form_data)
            .then(response => {
            if(response.data.status==response.data.statusmsg){
               this.alert=response.data.msg
            this.submit='Add'
            }else{
            this.submit='Add'
            this.alert=response.data.msg
            }
            this.getTodo()
        }).catch((error)=>{
            this.submit='Add'
            this.alert='Something went wrong!'
        })  
        },

        getTodo: function(){
            var url = document.querySelector('meta[name="directory_uri"]').content;
            this.submit='Loading... '
            axios.get(url+"/functions/gettodo.php")
            .then(response => {
            if(response.data.status==response.data.statusmsg){
               this.taskList=response.data.result
            this.submit='Add'
            }else{
            this.submit='Add'
            this.alert=response.data.msg
            }
        }).catch((error)=>{
            this.submit='Add'
            this.alert='Something went wrong!'
        })  
        },

        updateStatus: function(itemid, status){
            var url = document.querySelector('meta[name="directory_uri"]').content;
            this.submit='Updating... '
            var form_data = new FormData();
            form_data.append('itemid', itemid)
            form_data.append('status', status)
            axios.post(url+'/functions/update.php', form_data)
            .then(response => {
            if(response.data.status==response.data.statusmsg){
               this.alert=response.data.msg
            this.submit='Add'
            }else{
            this.submit='Add'
            this.alert=response.data.msg
            }
            this.getTodo()
        }).catch((error)=>{
            this.submit='Add'
            this.alert='Something went wrong!'
        })  
        },
    }
})