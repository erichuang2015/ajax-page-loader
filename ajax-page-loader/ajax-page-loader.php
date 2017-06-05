<?php
/**
 * Plugin Name: AJAX Page Loader
 * Plugin URI: https://github.com/thefarside/ajax-page-loader
 * Description: A lightweight AJAX page loader intended for developers.
 * Version: 0.0.1
 */
if ( is_admin() ) {
	add_action( 'admin_menu', 'admin_menu_APL' );
	add_action( 'admin_init', 'admin_init_APL' );
	function admin_menu_APL() {
		if ( current_user_can( 'manage_options' ) ) {
			add_options_page( 'Ajax Page Loader', 'Ajax Page Loader', 'manage_options', 'AjaxPageLoader', 'options_page_APL' );
		}
	}
	function options_page_APL() {
		if ( current_user_can( 'manage_options' ) ) {
		include( plugin_dir_path( __FILE__ ) . '/options.php' );
		}
	}
	function admin_init_APL() {
		if ( current_user_can( 'manage_options' ) ) {
			register_setting( 'APL', 'APL_content_id' );
			register_setting( 'APL', 'APL_search_class' );
			register_setting( 'APL', 'APL_search_disabled' );
			register_setting( 'APL', 'APL_ignore_class' );
			register_setting( 'APL', 'APL_ignore_list' );
			register_setting( 'APL', 'APL_page_load' );
			register_setting( 'APL', 'APL_before_ajax' );
			register_setting( 'APL', 'APL_xhr' );			
			register_setting( 'APL', 'APL_complete' );
			register_setting( 'APL', 'APL_comments_disabled' );
			register_setting( 'APL', 'APL_comments_form_class' );
			register_setting( 'APL', 'APL_comments_form_url' );
			register_setting( 'APL', 'APL_comments_xhr' );
			register_setting( 'APL', 'APL_comments_complete' );
			register_setting( 'APL', 'APL_comments_reload' );
			register_setting( 'APL', 'APL_login_disabled' );
			register_setting( 'APL', 'APL_login_form_id' );
			register_setting( 'APL', 'APL_login_url' );
			register_setting( 'APL', 'APL_login_xhr' );
			register_setting( 'APL', 'APL_login_complete' );
			register_setting( 'APL', 'APL_login_reload' );
			register_setting( 'APL', 'APL_login_lost_password_form_id' );
			register_setting( 'APL', 'APL_login_lost_password_url' );
			register_setting( 'APL', 'APL_login_lost_password_xhr' );
			register_setting( 'APL', 'APL_login_lost_password_complete' );
			register_setting( 'APL', 'APL_login_lost_password_reload' );
			register_setting( 'APL', 'APL_login_reset_password_form_id' );
			register_setting( 'APL', 'APL_login_reset_password_url' );
			register_setting( 'APL', 'APL_login_reset_password_xhr' );
			register_setting( 'APL', 'APL_login_reset_password_complete' );
			register_setting( 'APL', 'APL_login_reset_password_reload' );
			register_setting( 'APL', 'APL_login_register_form_id' );
			register_setting( 'APL', 'APL_login_register_url' );
			register_setting( 'APL', 'APL_login_register_xhr' );
			register_setting( 'APL', 'APL_login_register_complete' );
			register_setting( 'APL', 'APL_login_register_reload' );
			register_setting( 'APL', 'APL_disabled' );
			register_setting( 'APL', 'APL_admin_login_disabled' );
		}
	}
	register_activation_hook(  __FILE__, 'activate_APL'  );
	function activate_APL() {
		if ( current_user_can( 'manage_options' ) ) {
			update_option( APL_disabled, 'true' );
			update_option( APL_search_disabled, 'true' );
			update_option( APL_ignore_list, '#, /wp-, .pdf, .zip, .rar, .7z' );
			update_option( APL_comments_disabled, 'true' );
			update_option( APL_login_disabled, 'true' );
			update_option( APL_admin_login_disabled, 'true' );
		}
	}
	register_uninstall_hook(  __FILE__, 'uninstall_APL'  );
	function uninstall_APL() {
		if ( current_user_can( 'manage_options' ) ) {
			delete_option( 'APL_content_id' );
			delete_option( 'APL_search_class' );
			delete_option( 'APL_search_disabled' );
			delete_option( 'APL_ignore_class' );
			delete_option( 'APL_ignore_list' );
			delete_option( 'APL_page_load' );
			delete_option( 'APL_before_ajax' );
			delete_option( 'APL_xhr' );			
			delete_option( 'APL_complete' );
			delete_option( 'APL_comments_disabled' );
			delete_option( 'APL_comments_form_class' );
			delete_option( 'APL_comments_form_url' );
			delete_option( 'APL_comments_xhr' );
			delete_option( 'APL_comments_complete' );
			delete_option( 'APL_comments_reload' );
			delete_option( 'APL_login_disabled' );
			delete_option( 'APL_login_form_id' );
			delete_option( 'APL_login_url' );
			delete_option( 'APL_login_xhr' );
			delete_option( 'APL_login_complete' );
			delete_option( 'APL_login_reload' );
			delete_option( 'APL_login_lost_password_form_id' );
			delete_option( 'APL_login_lost_password_url' );
			delete_option( 'APL_login_lost_password_xhr' );
			delete_option( 'APL_login_lost_password_complete' );
			delete_option( 'APL_login_lost_password_reload' );
			delete_option( 'APL_login_reset_password_form_id' );
			delete_option( 'APL_login_reset_password_url' );
			delete_option( 'APL_login_reset_password_xhr' );
			delete_option( 'APL_login_reset_password_complete' );
			delete_option( 'APL_login_reset_password_reload' );
			delete_option( 'APL_login_register_form_id' );
			delete_option( 'APL_login_register_url' );
			delete_option( 'APL_login_register_xhr' );
			delete_option( 'APL_login_register_complete' );
			delete_option( 'APL_login_register_reload' );
			delete_option( 'APL_disabled' );
			delete_option( 'APL_admin_login_disabled' );
		}
	}
	add_action(  'wp_ajax_jquery_vars_APL', 'jquery_vars_APL_function'  );
	add_action(  'wp_ajax_nopriv_jquery_vars_APL', 'jquery_vars_APL_function'  );
	function jquery_vars_APL_function() {
		$variables = [
		get_option( 'APL_content_id' ),
		get_option( 'APL_search_class' ),
		get_option( 'APL_search_disabled' ),
		get_option( 'APL_ignore_class' ),
		get_option( 'APL_ignore_list' ),
		file_get_contents( get_option( 'APL_page_load' ) ),
		file_get_contents( get_option( 'APL_before_ajax' ) ),
		file_get_contents( get_option( 'APL_xhr' ) ),
		file_get_contents( get_option( 'APL_complete' ) ),
		get_option( 'APL_comments_disabled' ),
		get_option( 'APL_comments_form_class' ),
		get_option( 'APL_comments_form_url' ),
		file_get_contents( get_option( 'APL_comments_xhr' ) ),
		file_get_contents( get_option( 'APL_comments_complete' ) ),
		get_option( 'APL_comments_reload' ),
		get_option( 'APL_login_disabled' ),
		get_option( 'APL_login_form_id' ),
		get_option( 'APL_login_url' ),
		file_get_contents( get_option( 'APL_login_xhr' ) ),
		file_get_contents( get_option( 'APL_login_complete' ) ),
		get_option( 'APL_login_reload' ),
		get_option( 'APL_login_lost_password_form_id' ),
		get_option( 'APL_login_lost_password_url' ),
		file_get_contents( get_option( 'APL_login_lost_password_xhr' ) ),
		file_get_contents( get_option( 'APL_login_lost_password_complete' ) ),
		get_option( 'APL_login_lost_password_reload' ),
		get_option( 'APL_login_reset_password_form_id' ),
		get_option( 'APL_login_reset_password_url' ),
		file_get_contents( get_option( 'APL_login_reset_password_xhr' ) ),
		file_get_contents( get_option( 'APL_login_reset_password_complete' ) ),
		get_option( 'APL_login_lost_password_reload' ),
		get_option( 'APL_login_register_form_id' ),
		get_option( 'APL_login_register_url' ),
		file_get_contents( get_option( 'APL_login_register_xhr' ) ),
		file_get_contents( get_option( 'APL_login_register_complete' ) ),
		get_option( 'APL_login_register_reload' ),
		get_option( 'siteurl' )
		];
		echo json_encode( $variables );
		die();
	}
}
if ( get_option( 'APL_comments_disabled' ) != true ) {
	add_action( 'comment_post', 'comment_APL', 10, 1 );
	function comment_APL( $comment_ID ) {
		if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest' ){
			$comment = get_comment( $comment_ID );
			if ( wp_blacklist_check( 
									$comment->comment_author,
									$comment->comment_author_email,
									$comment->comment_author_url,
									$comment->comment_content,
									$comment->comment_author_IP,
									$comment->comment_agent
								    ) == 1 ) {
				$comment->comment_status = 'blacklisted';
			}
			if ( check_comment( 
								$comment->comment_author,
								$comment->comment_author_email,
								$comment->comment_author_url,
								$comment->comment_content,
								$comment->comment_author_IP,
								$comment->comment_agent,
								$comment->comment_type
							   ) == 0 ) {
				if ( get_option( 'moderation_notify' ) == 1 ) {
					wp_notify_moderator( $comment_ID );
				}
				$comment->comment_status = 'moderated';
			}
			if ( $comment->comment_approved == 1 ) {
				if ( get_option( 'comments_notify' ) == 1 ) {
					if ( $comment->comment_author_email != the_author_meta( 'user_email' ) ) { 
						wp_new_comment_notify_postauthor( $comment_ID );
					}
				}
				$comment->comment_status = 'approved';
			}		
			if ( get_option( 'page_comments' ) == 1 ) {
				$comment->comments_per_page = get_option( 'comments_per_page' );
				$comment->comments_per_page_order = get_option( 'default_comments_page' );
			}
			if ( get_option( 'thread_comments' ) == 1 ) {
				$comment->nested_comments_depth = get_option( 'thread_comments_depth' );
			}
			$comment->comment_order = get_option( 'comment_order' );
			if ( get_option( 'show_avatars' ) == 1 ) {
				$comment->comment_author_avatar_data = get_avatar_data( $comment->comment_author_email );
			}
			echo json_encode( $comment );
		}
		die();
	}
}
if ( get_option( 'APL_disabled' ) != true ) {
	add_action( 'wp_enqueue_scripts', 'register_script_APL' );
	function register_script_APL() {
		wp_register_script( 'apl',  plugins_url(  '/scripts/apl.js', __FILE__   ), array( 'jquery' ), '', false );
		wp_enqueue_script( 'apl' );
	}
	if ( get_option( 'APL_admin_login_disabled' ) != true ) {
		add_action(  'login_enqueue_scripts', 'register_admin_script_APL', 1  );
		function register_admin_script_APL() {
			wp_register_script( 'apl_admin',  plugins_url(  '/scripts/apl.js', __FILE__  ), array( 'jquery' ), '', false );
			wp_enqueue_script( 'apl_admin' );
		}
	}
}
add_filter( 'http_request_args', 'apl_prevent_update_check', 10, 2 );
function apl_prevent_update_check( $response, $url ) {
	if ( 0 === strpos( $url, 'https://api.wordpress.org/plugins/update-check/1.1/' ) ) {
		$basename = plugin_basename( __FILE__ );
		$plugins  = json_decode( $response['body']['plugins'] );
		unset( $plugins->plugins->$basename );
		unset( $plugins->active[ array_search( $basename, $plugins->active ) ] );
		$response['body']['plugins'] = json_encode( $plugins );
	}
	return $response;
}
?>
