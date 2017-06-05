<!DOCTYPE html>
<html>
	<head>
		<title>Ajax Page Loader</title>
		<style>
			.main {
				width: 80%;
			}
			.main div {
				padding: 5px 10px;
			}
			.main form > div:last-of-type {
				background: #cdf;
			}
			.main div div:nth-child(even) {
				background-color: rgba(0, 0, 0, .10);
			}
			.main input[type="text"] {
				width: 100%;
			}
			.main input[type="text"].small {
				width: 30%;
			}
			.main input[type="text"].small,
			.main input[type="checkbox"] {
				margin-left: 10px;
			}
			.collapse {
				cursor: pointer;
				display: block;
				padding: 5px;
				border-bottom: 1px solid;
				background: #cdf;
				font-weight: 900;
				font-size: 12pt;
			}
			.collapse + input {
				display: none;
			}
			.collapse + input + div {
				display: none;
			}
			.collapse + input:checked + div {
				display: block;
			}
		</style>
	</head>
	<body>
		<div class="main">
			<h1>Ajax Page Loader Configuration:</h1>
			<form action="options.php" enctype="multipart/form-data" method="post">
				<?php settings_fields('APL'); ?>
				<label class="collapse" for="basic">Basic:</label>
				<input id="basic" type="checkbox" checked="checked" />
				<div>
					<br />
					<strong>Disable APL:</strong>
					<input name="APL_disabled" type="checkbox" value="true" <?php if (strcmp(get_option('APL_disabled'), 'true')==0) { echo 'checked="checked"'; } ?> />
					<br />
					<br />
					<div>
						<br />
						<strong>Content Element ID:</strong>
						<input name="APL_content_id" placeholder="ID Value" class="small" type="text" value="<?php echo get_option('APL_content_id'); ?>" />
						<br />
						<br />
						<strong>Search Form CLASS:</strong>
						<input name="APL_search_class" placeholder="Class Value" class="small" type="text" value="<?php echo get_option('APL_search_class'); ?>" />
						<br />
						<strong>Disable AJAX Search:</strong>
						<input name="APL_search_disabled" type="checkbox" value="true" <?php if (strcmp(get_option('APL_search_disabled'), 'true')==0) { echo 'checked="checked"'; } ?> />
						<br />
						<br />
						<strong>Ignore Class:</strong>
						<input name="APL_ignore_class" placeholder="Class Value" class="small" type="text" value="<?php echo get_option('APL_ignore_class'); ?>" />
						<br />
						<br />
						<strong>URL Pattern Ignore List:</strong>
						<br />
						<input name="APL_ignore_list" placeholder="Comma-separated Values" type="text" value="<?php echo get_option('APL_ignore_list'); ?>" />
						<br />
						<br />
					</div>
				</div>
				<label class="collapse" for="advanced">Advanced:</label>
				<input id="advanced" type="checkbox" /> 
				<div>
					<br />
					<strong>Page Load:</strong>
					<br />
					<input name="APL_page_load" placeholder="Script URL" type="text" value="<?php echo get_option('APL_page_load'); ?>" />
					<br />
					<br />
					<strong>Before AJAX Function:</strong>
					<br />
					<input name="APL_before_ajax" placeholder="Script URL" type="text" value="<?php echo get_option('APL_before_ajax'); ?>" />
					<br />
					<br />
					<strong>AJAX XHR Function:</strong>
					<br />
					<input name="APL_xhr" placeholder="Script URL" type="text" value="<?php echo get_option('APL_xhr'); ?>" />
					<br />
					<br />
					<strong>AJAX Complete Function:</strong>
					<br />
					<input name="APL_complete" placeholder="Script URL" type="text" value="<?php echo get_option('APL_complete'); ?>" />
					<br />
					<br />
				</div>
				<label class="collapse" for="comments">Comments:</label>
				<input id="comments" type="checkbox" /> 
				<div>
					<br />
					<strong>Disable AJAX Comments:</strong>
					<input name="APL_comments_disabled" type="checkbox" value="true" <?php if (strcmp(get_option('APL_comments_disabled'), 'true')==0) { echo 'checked="checked"'; } ?> />
					<br />
					<br />
					<strong>Comment Form Class:</strong>
					<input name="APL_comments_form_class" placeholder="Class Value" class="small" type="text" value="<?php echo get_option('APL_comments_form_class'); ?>" />
					<br />
					<br />
					<strong>Comment Form Action:</strong>
					<br />
					<input name="APL_comments_form_url" placeholder="Form URL" type="text" value="<?php echo get_option('APL_comments_form_url'); ?>" />
					<br />
					<br />
					<strong>AJAX XHR Function:</strong>
					<br />
					<input name="APL_comments_xhr" placeholder="Script URL" type="text" value="<?php echo get_option('APL_comments_xhr'); ?>" />
					<br />
					<br />
					<strong>AJAX Complete Function:</strong>
					<br />
					<input name="APL_comments_complete" placeholder="Script URL" type="text" value="<?php echo get_option('APL_comments_complete'); ?>" />
					<br />
					<br />
					<strong>Reload Content On AJAX Complete:</strong>
					<input name="APL_comments_reload" type="checkbox" value="true" <?php if (strcmp(get_option('APL_comments_reload'), 'true')==0) { echo 'checked="checked"'; } ?> />
					<br />
					<br />
				</div>
				<label class="collapse" for="login">Login:</label>
				<input id="login" type="checkbox" /> 
				<div class="login">
					<br />
					<strong>Disable AJAX Login:</strong>
					<input name="APL_login_disabled" type="checkbox" value="true" <?php if (strcmp(get_option('APL_login_disabled'), 'true')==0) { echo 'checked="checked"'; } ?> />
					<br />
					<br />
					<strong>Disable AJAX Login (WordPress Login Page ONLY):</strong>
					<input name="APL_admin_login_disabled" type="checkbox" value="true" <?php if (strcmp(get_option('APL_admin_login_disabled'), 'true')==0) { echo 'checked="checked"'; } ?> />
					<br />
					<br />
					<div>
						<strong>Login Form ID:</strong>
						<input name="APL_login_form_id" placeholder="ID Value" class="small" type="text" value="<?php echo get_option('APL_login_form_id'); ?>" />
						<br />
						<br />
						<strong>Login Form Action:</strong>
						<br />
						<input name="APL_login_url" placeholder="Form URL" type="text" value="<?php echo get_option('APL_login_url'); ?>" />
						<br />
						<br />
						<strong>AJAX XHR Function:</strong>
						<br />
						<input name="APL_login_xhr" placeholder="Script URL" type="text" value="<?php echo get_option('APL_login_xhr'); ?>" />
						<br />
						<br />
						<strong>AJAX Complete Function:</strong>
						<br />
						<input name="APL_login_complete" placeholder="Script URL" type="text" value="<?php echo get_option('APL_login_complete'); ?>" />
						<br />
						<br />
						<strong>Reload Content On AJAX Complete:</strong>
						<input name="APL_login_reload" type="checkbox" value="true" <?php if (strcmp(get_option('APL_login_reload'), 'true')==0) { echo 'checked="checked"'; } ?> />
						<br />
						<br />
					</div>
					<div>
						<strong>Lost Password Form ID:</strong>
						<input name="APL_login_lost_password_form_id" placeholder="ID Value" class="small" type="text" value="<?php echo get_option('APL_login_lost_password_form_id'); ?>" />
						<br />
						<br />
						<strong>Lost Password Form Action:</strong>
						<br />
						<input name="APL_login_lost_password_url" placeholder="Form URL" type="text" value="<?php echo get_option('APL_login_lost_password_url'); ?>" />
						<br />
						<br />
						<strong>AJAX XHR Function:</strong>
						<br />
						<input name="APL_login_lost_password_xhr" placeholder="Script URL" type="text" value="<?php echo get_option('APL_login_lost_password_xhr'); ?>" />
						<br />
						<br />
						<strong>AJAX Complete Function:</strong>
						<br />
						<input name="APL_login_lost_password_complete" placeholder="Script URL" type="text" value="<?php echo get_option('APL_login_lost_password_complete'); ?>" />
						<br />
						<br />
						<strong>Reload Content On AJAX Complete:</strong>
						<input name="APL_login_lost_password_reload" type="checkbox" value="true" <?php if (strcmp(get_option('APL_login_lost_password_reload'), 'true')==0) { echo 'checked="checked"'; } ?> />
						<br />
						<br />
					</div>
					<div>
						<strong>Reset Password Form ID:</strong>
						<input name="APL_login_reset_password_form_id" placeholder="ID Value" class="small" type="text" value="<?php echo get_option('APL_login_reset_password_form_id'); ?>" />
						<br />
						<br />
						<strong>Reset Password Form Action:</strong>
						<br />
						<input name="APL_login_reset_password_url" placeholder="Form URL" type="text" value="<?php echo get_option('APL_login_reset_password_url'); ?>" />
						<br />
						<br />
						<strong>AJAX XHR Function:</strong>
						<br />
						<input name="APL_login_reset_password_xhr" placeholder="Script URL" type="text" value="<?php echo get_option('APL_login_reset_password_xhr'); ?>" />
						<br />
						<br />
						<strong>AJAX Complete Function:</strong>
						<br />
						<input name="APL_login_reset_password_complete" placeholder="Script URL" type="text" value="<?php echo get_option('APL_login_reset_password_complete'); ?>" />
						<br />
						<br />
						<strong>Reload Content On AJAX Complete:</strong>
						<input name="APL_login_reset_password_reload" type="checkbox" value="true" <?php if (strcmp(get_option('APL_login_reset_password_reload'), 'true')==0) { echo 'checked="checked"'; } ?> />
						<br />
						<br />
					</div>
					<div>
						<strong>Registration Form ID:</strong>
						<input name="APL_login_register_form_id" placeholder="ID Value" class="small" type="text" value="<?php echo get_option('APL_login_register_form_id'); ?>" />
						<br />
						<br />
						<strong>Registration Form Action:</strong>
						<br />
						<input name="APL_login_register_url" placeholder="Form URL" type="text" value="<?php echo get_option('APL_login_register_url'); ?>" />
						<br />
						<br />
						<strong>AJAX XHR Function:</strong>
						<br />
						<input name="APL_login_register_xhr" placeholder="Script URL" type="text" value="<?php echo get_option('APL_login_register_xhr'); ?>" />
						<br />
						<br />
						<strong>AJAX Complete Function:</strong>
						<br />
						<input name="APL_login_register_complete" placeholder="Script URL" type="text" value="<?php echo get_option('APL_login_register_complete'); ?>" />
						<br />
						<br />
						<strong>Reload Content On AJAX Complete:</strong>
						<input name="APL_login_register_reload" type="checkbox" value="true" <?php if (strcmp(get_option('APL_login_register_reload'), 'true')==0) { echo 'checked="checked"'; } ?> />
						<br />
						<br />
					</div>
				</div>
				<div>
					<input name="action" type="hidden" value="update" />
					<p class="submit">
						<input class="button-primary" type="submit" value="Save Configuration" />
					</p>
				</div>
			</form>
		</div>
	</body>
</html>