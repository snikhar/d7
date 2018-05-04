<div id="userprofile-form">
<div class="row">

<?php  //print kpr($form);  
print render($form['form_id']); 
print render($form['form_build_id']); 
print render ($form['form_token']);

print render($form['field_image']);
print render($form['title']);

print render ($form['actions']);?>
<div class="col-sm-12 col-md-12 col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Profile Details</div>
			<div class="panel-body">
			<div class="col-sm-6 col-md-6 col-lg-6">
				<div id="img_box"><img src="public://profile_img/<?php print render($form['user_img']["#default_value"]);?>" /></div>
				<?php print render($form['user_img']); //var_dump($form['user_img']);exit;?>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-6">			
				<h3><?php echo $user_name = $GLOBALS['user']->name; ?></h3>	
				<?php print render($form['gender']); ?>
				<?php print render($form['submit']); ?>
			</div>
			</div>
	</div>
	<div class="panel panel-default">
	<div class="panel-heading">Personal Details</div>
		<div class="panel-body">
		<div class="col-sm-6 col-md-6 col-lg-6">
			<?php print render($form['about_me']); ?>
			<?php print render($form['birth_date']); ?>
			<?php print render($form['hobbies']); ?>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6">
			<?php print render($form['religion']); ?>
			<?php print render($form['marital_status']); ?>
			<?php print render($form['birth_place']); ?>
			<?php print render($form['height']); ?>
		</div>
		</div>

	</div>
	<div class="panel panel-default">
	<div class="panel-heading">Professional Details</div>
		<div class="panel-body">
		<div class="col-sm-6 col-md-6 col-lg-6">
			<?php print render($form['education']); ?>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6">
			<?php print render($form['employment_type']); ?>
		</div>
		</div>

	</div>
	<div class="panel panel-default">
	<div class="panel-heading">Contact Details</div>
		<div class="panel-body">
		<div class="col-sm-6 col-md-6 col-lg-6">
			<?php print render($form['living_location']); ?>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6">
			<?php print render($form['mobile_number']); ?>
		</div>
		</div>

	</div>
	<div class="panel panel-default">
	<div class="panel-heading">Partner Preference</div>
		<div class="panel-body">
		<div class="col-sm-6 col-md-6 col-lg-6">
			<?php print render($form['partner_preference']); ?>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6">
			<?php print render($form['partner_height']); ?>
			<?php print render($form['partner_age']); ?>
			<?php print render($form['partner_education']); ?>
		</div>
		</div>

	</div>
</div>
</div>
</div>