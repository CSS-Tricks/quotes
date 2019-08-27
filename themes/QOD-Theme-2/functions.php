<?php

	if( !is_admin()){
	   wp_deregister_script('jquery'); 
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"), false, '1.3.2'); 
	   wp_enqueue_script('jquery');
	}

?>