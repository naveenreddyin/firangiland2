

<div class="fb_user-login-button-wrapper">

	<a href="<?php print base_path(). 'user/simple-fb-connect'; ?>">
		<?php print '<img src="'.base_path() . path_to_theme() .'/images/fblogin.png">'; ?>
	</a>
</div>


<h1>Or</h1> <br/>

<div class="bartik-user-login-form-wrapper">

	<?php print drupal_render_children($form); ?>

</div>