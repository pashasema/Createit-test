<?php
//custom ajax request to load pagination
add_action('wp_ajax_markaspaid','custom_markaspaid');
add_action('wp_ajax_nopriv_markaspaid','custom_markaspaid');
function custom_markaspaid(){
	$arrposts = $_POST['arrposts'];
	$count = count($arrposts);
	for ($i=0 ;$count > $i; $i++) { 
		update_post_meta($arrposts[$i],'status','verified');
	}
	die;
}