var APL_xhr = new XMLHttpRequest();
APL_xhr.open( 'POST', '/wp-admin/admin-ajax.php?action=APL_get_vars' );
APL_xhr.onload = function() {
	if ( APL_xhr.status === 200 ) {
		var APL_vars = JSON.parse( APL_xhr.response );
		var APL_content_id = APL_vars[0];
		var APL_search_class = APL_vars[1];
		var APL_search_disabled = APL_vars[2];
		var APL_ignore_class = APL_vars[3];
		var APL_ignore_list = APL_vars[4].split( ', ' );
		var APL_page_load = APL_vars[5];
		var APL_before_ajax = APL_vars[6];
		var APL_xhr2 = APL_vars[7];
		var APL_complete = APL_vars[8];
		var APL_comments_disabled = APL_vars[9];
		var APL_comments_form_class = APL_vars[10];
		var APL_comments_form_url = APL_vars[11];
		var APL_comments_xhr = APL_vars[12];
		var APL_comments_complete = APL_vars[13];
		var APL_comments_reload = APL_vars[14];
		var APL_login_disabled = APL_vars[15];
		var APL_login_form_id = APL_vars[16];
		var APL_login_url = APL_vars[17];
		var APL_login_xhr = APL_vars[18];
		var APL_login_complete = APL_vars[19];
		var APL_login_reload = APL_vars[20];
		var APL_login_lost_password_form_id = APL_vars[21];
		var APL_login_lost_password_url = APL_vars[22];
		var APL_login_lost_password_xhr = APL_vars[23];
		var APL_login_lost_password_complete = APL_vars[24];
		var APL_login_lost_password_reload = APL_vars[25];
		var APL_login_reset_password_form_id = APL_vars[26];
		var APL_login_reset_password_url = APL_vars[27];
		var APL_login_reset_password_xhr = APL_vars[28];
		var APL_login_reset_password_complete = APL_vars[29];
		var APL_login_reset_password_reload = APL_vars[30];
		var APL_login_register_form_id = APL_vars[31];
		var APL_login_register_url = APL_vars[32];
		var APL_login_register_xhr = APL_vars[33];
		var APL_login_register_complete = APL_vars[34];
		var APL_login_register_reload = APL_vars[35];
		var APL_site_url = APL_vars[36];
		if ( APL_page_load ) {
			eval( APL_page_load );
		}
		window.onpopstate = function() {
			var url = document.location.href;
			APL_loadPage( url, false );
		};
		var APL_check_ignore = function( url ) {
			for( var i in APL_ignore_list ) {
				if ( url.indexOf( APL_ignore_list[i] ) >= 0 ) {
					return false;
				}
			}
			return true;
		};
		var APL_postPage = function( form_name, form_action, xhr_onprogress, xhr_onload, reload_page ) {
			form_name.onsubmit = function( e ) {
				var data = new FormData( form_name );
				var xhr = new XMLHttpRequest();
				xhr.open( 'POST', form_action );
				if ( xhr_onprogress ) {
					eval( xhr_onprogress );
				}
				xhr.onload = function( data ) {
					if ( xhr_onload ) {
						eval( xhr_onload );
					}
					if ( reload_page == 'true' ) {
						APL_loadPage( document.location.toString(), true );
					}
				};
				xhr.send( data );
				e.preventDefault();
			};
		};
		var APL_loadPageInit = function() {
			var links = document.getElementsByTagName( 'a' );
			for( var i = 0; i < links.length; i++ ) {
				links[i].onclick = function( e ) {
					if ( this.href.indexOf( APL_site_url ) >= 0 && APL_check_ignore( this.href ) === true && ( this.className != ( APL_ignore_class ) || !this.className ) ) {
							e.preventDefault();
							APL_loadPage( this.href, true );
					}
				};
			}
			if ( !APL_search_disabled ) {
				var search = document.querySelector( '.' + APL_search_class );
				var searchURI = search.getAttribute( 'action' );
				var searchField = search.querySelector( '[name=s]' );
				if ( searchField ) {
					search.onsubmit = function( e ) {
						APL_loadPage( searchURI + '?s=' + searchField.value, true );
						searchField.value = '';
						e.preventDefault();
					};
				}
			}
			if ( !APL_comments_disabled ) {
				var comments_form = document.querySelector( '.' + APL_comments_form_class );
				if ( comments_form ) {
					APL_postPage( comments_form, APL_comments_form_url, APL_comments_xhr, APL_comments_complete, APL_comments_reload );
				}
			}
			if ( !APL_login_disabled ) {
				var login_form = document.getElementById( APL_login_form_id );
				if ( login_form ) {
					APL_postPage( login_form, APL_login_url, APL_login_xhr, APL_login_complete, APL_login_reload );
				}
				var lost_form = document.getElementById( APL_login_lost_password_form_id );
				if ( lost_form ) {
					APL_postPage( lost_form, APL_login_lost_password_url, APL_login_lost_password_xhr, APL_login_lost_password_complete, APL_login_lost_password_reload );
				}
				var reset_form = document.getElementById( APL_login_reset_password_form_id );
				if ( reset_form ) {
					APL_postPage( reset_form, APL_login_reset_password_url, APL_login_reset_password_xhr, APL_login_reset_password_complete, APL_login_reset_password_reload );
				}
				var register_form = document.getElementById( APL_login_register_form_id );
				if ( register_form ) {
					APL_postPage( register_form, APL_login_register_url, APL_login_register_xhr, APL_login_register_complete, APL_login_register_reload );
				}
			}
		};
		var APL_loadPage = function( url, push ) {
			if ( APL_before_ajax ) {
				eval( APL_before_ajax );
			}
			var xhr = new XMLHttpRequest();
			xhr.open( 'GET', url );
			xhr.responseType = 'document';
			if ( APL_xhr2 ) {
				eval( APL_xhr2 );
			}
			xhr.onload = function( data ) {
				if ( push === true ) {
					window.history.pushState( {}, data.target.response.title, data.target.response.URL );
				}
				document.title = data.target.response.title;
				if ( document.getElementById( APL_content_id ) ) {
					document.getElementById( APL_content_id ).innerHTML = data.target.response.getElementById( APL_content_id ).innerHTML;
				}
				if ( APL_complete ) {
					eval( APL_complete );
				}
				APL_loadPageInit();
			};
			xhr.send();
		};
		APL_loadPageInit();
	}
};
APL_xhr.send();
