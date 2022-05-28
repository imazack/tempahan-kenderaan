<?php 
/*
	=================
	  AJAX FUNCTION
	=================
*/

/* +++++ Front-End +++++ */

//pengguna pendaftaran akaun form
add_action('wp_ajax_nopriv_stk_save_pengguna_akaun_form', 'stk_save_pengguna');  	//for every user
add_action('wp_ajax_stk_save_pengguna_akaun_form', 'stk_save_pengguna');			//for log-in user only




//user contact form
function stk_save_pengguna(){
	
	$Fname = wp_strip_all_tags($_POST["Fname"]);
	$Lname = wp_strip_all_tags($_POST["Lname"]);
	$jawatan = wp_strip_all_tags($_POST["jawatan"]);
    $bahagian = wp_strip_all_tags(get_option('bahagian'));
    $phone = wp_strip_all_tags($_POST["phone"]);
	$email = wp_strip_all_tags($_POST["email"]);	
	$pass = wp_strip_all_tags($_POST["pass"]);
	//$radio_admin = wp_strip_all_tags(get_option('yes_admin')); 
	
	$args = array (
		'post_title'	=>	$Fname,
		//'post_content'  =>	$message,
		'post_author'	=>	1,
		'post_status'	=>	'publish',
		'post_type'	    =>	'daftar-stk',
		'meta_input'	=>	array(
                            'nama_sendiri_text'  => $Fname,
                            'nama_keluarga_text' => $Lname,
                            'jawatan_text'       => $jawatan,
                            'bahagian_select'    => $bahagian,
                            'phone_text'         => $phone,
                            'email_text'         => $email,
                            'pass_text'          => $pass,
                            //'yes_admin'    	=> $radio_admin,
                            )
	);
	
	$postID = wp_insert_post($args);
	
	// if($postID !== 0){
	
	// 	$to = $emailAdd;
	// 	$subject = $companyName.' Contact Form -'.$name;
	// 	$message = $autoMsg.'<br><hr><p>'.$message.'</p>';
		
	// 	$headers[] = 'From:'.$companyName.'<'.$to.'>';
	// 	$headers[] = 'Reply-To:'.$name.'<'.$email.'>';
	// 	$headers[] = 'Content-Type: text/html: charset=UTF-8';
	
	// 	wp_mail($to, $subject, $message, $headers);
		
	// 	echo $postID;
		
	// }else{
	// 	echo 0;
	// }
	
	die();
}