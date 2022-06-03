<?php 
/*
	=================
	  AJAX FUNCTION
	=================
*/

/* +++++ Front-End +++++ */

//Contact Form Submission

//user contact form
add_action('wp_ajax_nopriv_bzbr001_save_user_contact_form', 'stk_save_daftar');  	//for every user
add_action('wp_ajax_bzbr001_save_user_contact_form', 'stk_save_daftar');			//for log-in user only


//user contact form
function stk_save_daftar(){
	
	$nomTel = wp_strip_all_tags($_POST["nomTel"]);
	$email = wp_strip_all_tags($_POST["email"]);
	$nama = wp_strip_all_tags($_POST["nama"]);
	$companyName = esc_attr(get_option('company_name'));
	$emailAdd = esc_attr(get_option('email_add'));
	$autoMsg = esc_attr(get_option('autorespond_message')); 
	
	$args = array (
		'post_title'	=>	$nomTel,
		'post_content'=>	$nama,
		'post_author'	=>	1,
		'post_status'	=>	'publish',
		'post_type'	=>	'stk-contact',
		'meta_input'	=>	array('_contact_email_value_key' => $email)
	);
	
	$postID = wp_insert_post($args);
	
	if($postID !== 0){
	
		$to = $emailAdd;
		$subject = $companyName.' Contact Form -'.$nomTel;
		$nama = $autoMsg.'<br><hr><p>'.$nama.'</p>';
		
		$headers[] = 'From:'.$companyName.'<'.$to.'>';
		$headers[] = 'Reply-To:'.$name.'<'.$email.'>';
		$headers[] = 'Content-Type: text/html: charset=UTF-8';
	
		wp_mail($to, $subject, $nama, $headers);
		
		echo $postID;
		
	}else{
		echo 0;
	}
	
	die();
}

