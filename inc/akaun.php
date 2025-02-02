<?php

/************************/
/* CPT AKAUN PEMOHON */
/**********************/

function pendaftaran_akaun_custom_post_type() {
	add_theme_support( 'post-thumbnails', array( 'post', 'daftar-stk' ) );

	$labels = array(
		'name'                  => _x( 'Pendaftaran', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Pendaftaran', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Pendaftaran', 'text_domain' ),
		'name_admin_bar'        => __( 'Pendaftaran', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Senarai Pendaftaran', 'text_domain' ),
		'add_new_item'          => __( 'Tambah Pendaftaran', 'text_domain' ),
		'add_new'               => __( 'Tambah Pendaftaran', 'text_domain' ),
		'new_item'              => __( 'Pendaftaran Baharu', 'text_domain' ),
		'edit_item'             => __( 'Ubah Pendaftaran', 'text_domain' ),
		'update_item'           => __( 'Kemaskini Pendaftaran', 'text_domain' ),
		'view_item'             => __( 'Lihat Pendaftaran', 'text_domain' ),
		'view_items'            => __( 'Lihat Pendaftaran', 'text_domain' ),
		'search_items'          => __( 'Cari Pendaftaran', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Surat Arahan', 'text_domain' ),
		'set_featured_image'    => __( 'Muatnaik', 'text_domain' ),
		'remove_featured_image' => __( 'Padam', 'text_domain' ),
		'use_featured_image'    => __( 'Guna Surat Arahan', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Pendaftaran', 'text_domain' ),
		'description'           => __( 'Senarai akaun pemohon', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		//'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
    	'menu_icon'             => 'dashicons-car', //icon kat wp admin
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'daftar-stk', $args );

}
add_action( 'init', 'pendaftaran_akaun_custom_post_type', 0 );


/********************/
/* 		META BOXES 	*/
/*******************/

add_action( 'add_meta_boxes', 'stk_pendaftaran_meta_box_add' );
function stk_pendaftaran_meta_box_add()
{
		//Section A - Log Masuk//
    add_meta_box( 'section_a_daftar', 'Log Masuk', 'stk_pendaftaran_metabox_sa', 'daftar-stk', 'normal', 'default' );
		//Section B - Akaun Pemohon//
    add_meta_box( 'section_b_daftar', 'Akaun Pemohon', 'stk_pendaftaran_metabox_sb', 'daftar-stk', 'normal', 'default' );
}


///////////////////////////////////
// Section A - Log Masuk  //
//////////////////////////////////
function section_a_daftar($post) {
	echo 'Section A';
}

function stk_pendaftaran_metabox_sa($post)
{
	// We'll use this nonce field later on when saving.
	wp_nonce_field( 'stk_pendaftaran_metabox_nonce', 'stk_nonce' );
	
	$email = get_post_meta( $post->ID, 'email_text', true );
    $pass = get_post_meta($post->ID, 'password_text', true);

	?>
	<p>
			<label for="email_text">ID Pengguna</label>
			<input type="email" name="email_text" id="email_text" value="<?php echo esc_attr($email); ?>" placeholder="Emel Rasmi" />
			<label for="pass_text">Kata Laluan</label>
            <input type="password" name="pass_text" id="pass_text" value="<?php echo esc_attr($pass); ?>" placeholder="Masukan Kata Laluan" />
	</p>
<?php        
}

///////////////////////////////////
// Section B - Akaun Pemohon  //
//////////////////////////////////
function section_b_daftar($post) {
	echo 'Section B';
}

function stk_pendaftaran_metabox_sb($post)
{
	// We'll use this nonce field later on when saving.
	wp_nonce_field( 'stk_pendaftaran_metabox_nonce', 'stk_nonce' );
	
	$namasendiri = get_post_meta( $post->ID, 'nama_sendiri_text', true );
	$namakeluarga = get_post_meta( $post->ID, 'nama_keluarga_text', true );
	$jawatan = get_post_meta( $post->ID, 'jawatan_text', true );
	$bahagian = get_post_meta( $post->ID, 'bahagian_select', true );
	$phone = get_post_meta( $post->ID, 'phone_text', true );
	$email = get_post_meta( $post->ID, 'email_text', true );
    $pass = get_post_meta($post->ID, 'password_text', true);

	?>
	<p>
		<label for="nama_text">Nama Penuh</label>
		<input type="text" name="nama_sendiri_text" id="nama_sendiri_text" value="<?php echo esc_attr($namasendiri); ?>" placeholder="Nama Sendiri" />
		<input type="text" name="nama_keluarga_text" id="nama_keluarga_text" value="<?php echo esc_attr($namakeluarga); ?>" placeholder="Nama Keluarga" />
	</p>
	<p>
		<label for="jawatan_text">Jawatan</label>
		<input type="text" name="jawatan_text" id="jawatan_text" value="<?php echo esc_attr($jawatan); ?>" />
	</p>
	<p>
		<label for="bahagian_select">Bahagian</label>
		<select name="bahagian_select" id="bahagian_select">
			<option value="none" selected disabled hidden>Nyatakan Bahagian</option>
            <option value="pengurusan_atasan" <?php selected( $bahagian, 'pengurusan_atasan' ); ?>>Pengurusan Atasan (KP,TKP (D), TKP (O)</option>
            <option value="bkp" <?php selected( $bahagian, 'bkp' ); ?>>Bahagian Khidmat Pengurusan</option>
			<option value="bkps" <?php selected( $bahagian, 'bkps' ); ?>>Bahagian Keselamatan Personel</option>
            <option value="bpk" <?php selected( $bahagian, 'bpk' ); ?>>Bahagian Penyelarasan dan Korporat</option>
			<option value="bkictrr" <?php selected( $bahagian, 'bkictrr' ); ?>>Bahagian Keselamatan ICT dan Rahsia Rasmi</option>
            <option value="bipp" <?php selected( $bahagian, 'bipp' ); ?>>Bahagian Inspektoran, Pematuhan dan Pengiktirafan</option>
			<option value="bkfpt" <?php selected( $bahagian, 'bkfpt' ); ?>>Bahagian Keselamatan Fizikal dan Penilaian Teknikal</option>
            <option value="bspkltl" <?php selected( $bahagian, 'bspkltl' ); ?>>Bahagian Sasaran Penting, Kawasan Larangan dan Tempat Larangan</option>
			<option value="bah_kompleks" <?php selected( $bahagian, 'bah_kompleks' ); ?>>Bahagian Kompleks Pentadbiran Kerajaan Persekutuan</option>
            <option value="integriti" <?php selected( $bahagian, 'integriti' ); ?>>Unit Integriti</option>
        </select>
	</p>
	<p>
		<label for="phone_text">No. Telefon</label>
		<input type="text" name="phone_text" id="phone_text" value="<?php echo esc_attr($phone); ?>" />
		<label for="email_text">Emel</label>
		<input type="email" name="email_text" id="email_text" value="<?php echo esc_attr($email); ?>" placeholder="Emel Rasmi" />
	</p>
		<label for="pass_text">Cipta Kata Laluan</label>
        <input type="password" name="pass_text" id="pass_text" value="<?php echo esc_attr($pass); ?>" placeholder="Cipta Kata Laluan" />
	<p>
		<label for="admin_radio">Adakah Anda Pentadbir Sistem</label>
		<input type="radio" name="keputusan_radio" value="Lulus" <?php echo ($keputusan == 'Lulus')? 'checked="checked"':''; ?>/>Ya
		<input type="radio" name="keputusan_radio" value="Tidak Lulus" <?php echo ($keputusan == 'Tidak Lulus')? 'checked="checked"':''; ?>/>Tidak
	</p>
	</p>
<?php        
}


/********************/
/* 		SAVING DATA		*/
/*******************/

add_action( 'save_post', 'stk_pendaftaran_metabox_save' );
function stk_pendaftaran_metabox_save( $post_id )
{

	  // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
		if( !isset( $_POST['stk_nonce'] ) || !wp_verify_nonce( $_POST['stk_nonce'], 'stk_pendaftaran_metabox_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
         

		///////////////////////
		// Saving Section A //
		/////////////////////

    // Make sure your data is set before trying to save it
    if( isset( $_POST['nama_sendiri_text'] ) ){
        update_post_meta( $post_id, 'nama_sendiri_text', $_POST['nama_sendiri_text'] );
		}
		if( isset( $_POST['email_text'] ) ){
			update_post_meta( $post_id, 'email_text', $_POST['email_text'] );
        }
		if( isset( $_POST['pass_text'] ) ){
			update_post_meta( $post_id, 'pass_text', $_POST['pass_text'] );
		}

		///////////////////////
		// Saving Section B //
		/////////////////////

    // Make sure your data is set before trying to save it
    if( isset( $_POST['nama_sendiri_text'] ) ){
        update_post_meta( $post_id, 'nama_sendiri_text', $_POST['nama_sendiri_text'] );
		}
		if( isset( $_POST['nama_keluarga_text'] ) ){
			update_post_meta( $post_id, 'nama_keluarga_text', $_POST['nama_keluarga_text'] );
		}
		if( isset( $_POST['jawatan_text'] ) ){
			update_post_meta( $post_id, 'jawatan_text', $_POST['jawatan_text'] );
		}
		if( isset( $_POST['bahagian_select'] ) ){
			update_post_meta( $post_id, 'bahagian_select', $_POST['bahagian_select'] );
		}
		if( isset( $_POST['phone_text'] ) ){
			update_post_meta( $post_id, 'phone_text', $_POST['phone_text'] );
		}
		if( isset( $_POST['email_text'] ) ){
			update_post_meta( $post_id, 'email_text', $_POST['email_text'] );
        }
		if( isset( $_POST['pass_text'] ) ){
			update_post_meta( $post_id, 'pass_text', $_POST['pass_text'] );
		}
		if( isset( $_POST['admin_radio'] ) ){
			update_post_meta( $post_id, 'keputusan_radio', $_POST['keputusan_radio'] );
		}

		
		// This is purely my personal preference for saving check-boxes
    // $chk = isset( $_POST['my_meta_box_check'] ) && $_POST['my_meta_box_select'] ? 'on' : 'off';
    // update_post_meta( $post_id, 'my_meta_box_check', $chk );
}


/********************/
/* DISPLAY COLUMNS	*/
/*******************/

// Add the custom columns to the daftar-stk post type:
add_filter( 'manage_daftar-stk_posts_columns', 'set_custom_edit_daftar_columns' );
function set_custom_edit_daftar_columns($columns) {
    unset( $columns['author'] );
    unset( $columns['date'] );
    $columns['nama_sendiri_text'] = __( 'Nama', 'your_text_domain' );
    $columns['email_text'] = __( 'Alamat Emel', 'your_text_domain' );
	$columns['pass_text'] = __( 'Kata Laluan', 'your_text_domain' );

    return $columns;
}

// Add the data to the custom columns for the daftar-stk post type:
add_action( 'manage_daftar-stk_posts_custom_column' , 'custom_daftar_column', 10, 2 );
function custom_daftar_column( $column, $post_id ) {
    switch ( $column ) {

        case 'nama_sendiri_text' :
            echo get_post_meta( $post_id , 'nama_sendiri_text' , true );
            break;

        case 'email_text' :
            echo get_post_meta( $post_id , 'email_text' , true ); 
            break;

		case 'tarikh_ambil_text' :
			echo get_post_meta( $post_id , 'pass_text' , true ); 
			break;

    }
}
