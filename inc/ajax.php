<?php 
/*
	=================
	  AJAX FUNCTION
	=================
*/

/* +++++ Front-End +++++ */

//Contact Form Submission

//user contact form
add_action('wp_ajax_nopriv_bzbr001_save_user_contact_form', 'bzbr001_save_contact');  	//for every user
add_action('wp_ajax_bzbr001_save_user_contact_form', 'bzbr001_save_contact');			//for log-in user only


//user contact form
function bzbr001_save_contact(){
	
	$name = wp_strip_all_tags($_POST["name"]);
	$email = wp_strip_all_tags($_POST["email"]);
	$message = wp_strip_all_tags($_POST["message"]);
	$companyName = esc_attr(get_option('company_name'));
	$emailAdd = esc_attr(get_option('email_add'));
	$autoMsg = esc_attr(get_option('autorespond_message')); 
	
	$args = array (
		'post_title'	=>	$name,
		'post_content'=>	$message,
		'post_author'	=>	1,
		'post_status'	=>	'publish',
		'post_type'	=>	'stk-contact',
		'meta_input'	=>	array('_contact_email_value_key' => $email)
	);
	
	$postID = wp_insert_post($args);
	
	if($postID !== 0){
	
		$to = $emailAdd;
		$subject = $companyName.' Contact Form -'.$name;
		$message = $autoMsg.'<br><hr><p>'.$message.'</p>';
		
		$headers[] = 'From:'.$companyName.'<'.$to.'>';
		$headers[] = 'Reply-To:'.$name.'<'.$email.'>';
		$headers[] = 'Content-Type: text/html: charset=UTF-8';
	
		wp_mail($to, $subject, $message, $headers);
		
		echo $postID;
		
	}else{
		echo 0;
	}
	
	die();
}

