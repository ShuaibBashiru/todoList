<?php
// For decagon
function todo_script_enqueue(){
// intialize my stylesheets
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0', 'all');
	wp_enqueue_style('boostrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array(), '1.0.0', 'all');
	
	// intialize my Js scripts
	wp_enqueue_script('boostrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), '2.5.17', true);
	wp_enqueue_script('vue', get_template_directory_uri() . '/js/vue-debug.js', array('jquery'), '2.5.17', true);
	wp_enqueue_script('axios', 'https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js', array('jquery'), '2.5.17', true);
	wp_enqueue_script('customjs', get_template_directory_uri() . '/js/main.js', array('jquery'), '2.5.17', true);
}

add_action('wp_enqueue_scripts', 'todo_script_enqueue');

function createTable($atts){
	 $servername = 'localhost';
     $username = 'root';
     $password = '';
     $dbname = 'wordpress_todo';
 
	try {
		$db = new mysqli($servername, $username, $password, $dbname);
		if ($db->connect_error) {
		   return 'Error connecting to database';
		}else{
		//    return $db;
		   $sql = "CREATE TABLE IF NOT EXISTS todolist_tbl(
			id int not null AUTO_INCREMENT,
			task text not null,
			status_ varchar(30) not null,
			created_at datetime not null,
			due_date datetime not null,
			primary key(id)
			)";

		   $res = $db->query($sql);
		   if($res){
			
		   }{
			   return 'Something went wrong!';

		   }

		}
	
	  } catch (\Throwable $e) {
		  return 'Error connecting to database';
	  }

  }

add_action('wp_enqueue_scripts', 'createTable');
