<?php

	if( !is_admin()){
	   wp_deregister_script('jquery'); 
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"), false); 
	   wp_enqueue_script('jquery');
	}

?>