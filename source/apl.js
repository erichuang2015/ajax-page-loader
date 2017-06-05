jQuery.ajax({
	type: 'POST',
	url: '/wp-admin/admin-ajax.php',
	data: { 'action': 'jquery_vars_APL' },
	dataType: 'json',
	success: function( jQueryVars ) {
		var APL_content_id = '#' + jQueryVars[0];
		var APL_search_class = '.' + jQueryVars[1];
		var APL_search_disabled = jQueryVars[2];
		var APL_ignore_class = jQueryVars[3];
		var APL_ignore_list = jQueryVars[4].split( ', ' );
		var APL_page_load = jQueryVars[5];
		var APL_before_ajax = jQueryVars[6];
		var APL_xhr = jQueryVars[7];
		var APL_complete = jQueryVars[8];
		var APL_comments_disabled = jQueryVars[9];
		var APL_comments_form_class = '.' + jQueryVars[10];
		var APL_comments_form_url = jQueryVars[11];
		var APL_comments_xhr = jQueryVars[12];
		var APL_comments_complete = jQueryVars[13];
		var APL_comments_reload = jQueryVars[14];
		var APL_login_disabled = jQueryVars[15];
		var APL_login_form_id = '#' + jQueryVars[16];
		var APL_login_url = jQueryVars[17];
		var APL_login_xhr = jQueryVars[18];
		var APL_login_complete = jQueryVars[19];
		var APL_login_reload = jQueryVars[20];
		var APL_login_lost_password_form_id = '#' + jQueryVars[21];
		var APL_login_lost_password_url = jQueryVars[22];
		var APL_login_lost_password_xhr = jQueryVars[23];
		var APL_login_lost_password_complete = jQueryVars[24];
		var APL_login_lost_password_reload = jQueryVars[25];
		var APL_login_reset_password_form_id = '#' + jQueryVars[26];
		var APL_login_reset_password_url = jQueryVars[27];
		var APL_login_reset_password_xhr = jQueryVars[28];
		var APL_login_reset_password_complete = jQueryVars[29];
		var APL_login_reset_password_reload = jQueryVars[30];
		var APL_login_register_form_id = '#' + jQueryVars[31];
		var APL_login_register_url = jQueryVars[32];
		var APL_login_register_xhr = jQueryVars[33];
		var APL_login_register_complete = jQueryVars[34];
		var APL_login_register_reload = jQueryVars[35];
		var APL_site_url = jQueryVars[36];
		var APL_isLoad = false;
		var APL_started = false;
		if ( !APL_ignore_class ) {
			APL_ignore_class = true;
		}
		jQuery( document ).ready(function() {
			if ( APL_page_load ) {
				eval( APL_page_load );
			}
			APL_loadPageInit();
		});
		function APL_check_ignore( url ) {
			for( var i in APL_ignore_list ) {
				if ( url.indexOf( APL_ignore_list[i] ) >= 0 ) {
					return false;
				}
			}
			return true;
		}
		window.onpopstate = function() {
			if ( APL_started === true ) {
				var url = document.location.toString();
				var search_query = url.substr( url.lastIndexOf( '/' ) + 1 );
				if ( /s=/.test( search_query ) == 1 ) {
					url = url.replace( search_query, '' );
					APL_loadPage( url, 1, search_query );
				} else {
					APL_loadPage( url, 1 );
				}
			}
		};
		function APL_loadPageInit() {
			jQuery( 'a' ).on( 'click', function( e ) {
				if ( this.href.indexOf( APL_site_url ) >= 0 && 
					 APL_check_ignore( this.href ) == true &&
					 !jQuery( this ).hasClass( APL_ignore_class ) ) {
					e.preventDefault();
					APL_loadPage( this.href );
				}
			});
			if ( !APL_search_disabled ) {
				jQuery( APL_search_class ).each(function() {
					if ( jQuery( this ).attr( 'action' ) ) {
						APL_searchPath = jQuery( this ).attr( 'action' );
						jQuery( this ).on( 'submit', function( e ) {
							APL_loadPage( APL_searchPath, 0, jQuery( this ).serialize() );
							jQuery( APL_search_class + ' input[type=text]' + ',' + APL_search_class + ' input[type=search]' ).val( '' );
							e.preventDefault();
						});
					}
				});
			}
			if ( !APL_comments_disabled ) {
				jQuery( APL_comments_form_class ).on( 'submit', function( e ) {
					var data = jQuery( APL_comments_form_class ).serialize();
					jQuery.ajax({
						type: 'post',
						url: APL_comments_form_url,
						data: data,
						dataType: 'json',
						xhr: function() {
							var xhr = new window.XMLHttpRequest();
							if ( APL_comments_xhr ) {
								eval( APL_comments_xhr );
							}
							return xhr;
						},
						complete: function( data ) {
							if ( APL_comments_complete ) {
								eval( APL_comments_complete );
							}
							if ( APL_comments_reload == 'true' ) {
								APL_loadPage( document.location.toString(), 0 );
							}
						}
					});
					e.preventDefault();
				});
			};
			if ( !APL_login_disabled ) {
				jQuery( APL_login_form_id ).on( 'submit', function( e ) {
					var data = jQuery( APL_login_form_id ).serialize();
					jQuery.ajax({
						type: 'POST',
						url: APL_login_url,
						data: data,
						xhr: function() {
							var xhr = new window.XMLHttpRequest();
							if ( APL_login_xhr ) {
								eval( APL_login_xhr );
							}
							return xhr;
						},
						complete: function( data ) {
							if ( APL_login_complete ) {
								eval( APL_login_complete );
							}
							if ( APL_login_reload == 'true' ) {
								APL_loadPage( document.location.toString(), 0 );
							}
						}
					});
					e.preventDefault();
				});
				jQuery( APL_login_lost_password_form_id ).on( 'submit', function( e ) {
					var data = jQuery( APL_login_lost_password_form_id ).serialize();
					jQuery.ajax({
						type: 'POST',
						url: APL_login_lost_password_url,
						data: data,
						xhr: function() {
							var xhr = new window.XMLHttpRequest();
							if ( APL_login_lost_password_xhr ) {
								eval( APL_login_lost_password_xhr );
							}
							return xhr;
						},
						complete: function( data ) {
							if ( APL_login_lost_password_complete ) {
								eval( APL_login_lost_password_complete );
							}
							if ( APL_login_lost_password_reload == 'true' ) {
								APL_loadPage( document.location.toString(), 0 );
							}
						}
					});
					e.preventDefault();
				});
				jQuery( APL_login_reset_password_form_id ).on( 'submit', function( e ) {
					var data = jQuery( APL_login_reset_password_form_id ).serialize();
					jQuery.ajax({
						type: 'POST',
						url: APL_login_reset_password_url,
						data: data,
						xhr: function() {
							var xhr = new window.XMLHttpRequest();
							if ( APL_login_reset_password_xhr ) {
								eval( APL_login_reset_password_xhr );
							}
							return xhr;
						},
						complete: function( data ) {
							if ( APL_login_reset_password_complete ) {
								eval( APL_login_reset_password_complete );
							}
							if ( APL_login_reset_password_reload == 'true' ) {
								APL_loadPage( document.location.toString(), 0 );
							}
						}
					});
					e.preventDefault();
				});
				jQuery( APL_login_register_form_id ).on( 'submit', function( e ) {
					var data = jQuery( APL_login_register_form_id ).serialize();
					jQuery.ajax({
						type: 'POST',
						url: APL_login_register_url,
						data: data,
						xhr: function() {
							var xhr = new window.XMLHttpRequest();
							if ( APL_login_register_xhr ) {
								eval( APL_login_register_xhr );
							}
							return xhr;
						},
						complete: function( data ) {
							if ( APL_login_register_complete ) {
								eval( APL_login_register_complete );
							}
							if ( APL_login_register_reload == 'true' ) {
								APL_loadPage( document.location.toString(), 0 );
							}
						}
					});
					e.preventDefault();
				});
			}
		}
		function APL_loadPage( url, push, search_query ) {
			if ( !APL_isLoad ) {
				APL_isLoad = true;
				APL_started = false;
				pathIndex = url.indexOf( url.split( document.domain ).slice( 1 ) );
				path = url.substring( pathIndex );
				if ( search_query ) {
					path = path + search_query;
				}
				if ( push != 1 ) {
					if ( typeof window.history.pushState == 'function' ) {
						stateObj = {
							rand: 1000 + Math.random() * 1001
						};
						history.pushState( stateObj, 'AJAX Loaded Content', path );
					}
				}
				if ( APL_before_ajax ) {
					eval( APL_before_ajax );
				}
				jQuery.ajax({
					type: 'GET',
					url: url,
					data: search_query,
					cache: false,
					dataType: 'html',
					xhr: function() {
						var xhr = new window.XMLHttpRequest();
						if ( APL_xhr ) {
							eval( APL_xhr );
						}
						return xhr;
					},
					complete: function( data ) {
						APL_isLoad = false;
						APL_started = true;
						jQuery( document ).attr( 'title', jQuery( data.responseText ).filter( 'title' ).text() );
						jQuery( APL_content_id ).html( jQuery( data.responseText ).filter( APL_content_id ).html() );
						if ( APL_complete ) {
							eval( APL_complete );
						}
						APL_loadPageInit();
					}
				});
			}
		}
	}
});