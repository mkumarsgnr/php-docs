<?php include('public_header.php');?>
 <div class="container">
 	<?php echo form_open('login/admin_login'); ?>
 	<form>
	   <fieldset>
	    	<legend>Admin Login</legend>
	    	<?php if($error =$this->session->flashdata('login_failed')):?>
	    	<div class="row">
	    		<div class="col-md-6">
	    			<div class="alert alert-danger">
	    				<?= $error;?>
	    			</div>
	    		</div>
	    	</div>
	    <?php endif;?>
	    	<div class="row">
	    		<div class="col-md-6">
	    			<div class="form-group">
	      				<label for="exampleInputEmail1">Email address</label>
	     				 <?php echo form_input(['class'=>'form-control','name'=>'email','placeholder'=>'Enter Email','value'=>set_value('email')]);?>
	    			</div>
	    		</div>
	    		<div class="col-md-6">
	    			<?php echo form_error('email');?>
	    		</div>
	    	</div>
	    	<div class="row">
		    	<div class="col-md-6">
		    		<div class="form-group">
	      				<label for="exampleInputPassword1">Password</label>
	      					<?php echo form_input(['class'=>'form-control','name'=>'password','placeholder'=>'Password','value'=>set_value('password')]);?>
	    			</div>
		    	</div>
		    	<div class="col-md-6">
		    		<?php echo form_error('password');?>
		    	</div>
	    	</div>
	    	 <?php echo 	form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-danger']);
	    		echo	form_submit(['name'=>'Submit','value'=>'Login','class'=>'btn btn-primary']);?>
	  </fieldset>
	</form>
</div>
<?php include('public_footer.php')?>