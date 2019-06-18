<?php include('admin_header.php');?>
	<div class="container">
		 	<?php echo form_open('admin/store_article'); ?>
		 	<?php echo form_hidden('user_id',$this->session->userdata('user_id'));?>
	 	<form>
		   <fieldset>
		    	<legend>Add Article</legend>
		    	<div class="row">
		    		<div class="col-md-6">
		    			<div class="form-group">
		      				<label >Article Title</label>
		     				 <?php echo form_input(['class'=>'form-control','name'=>'title','placeholder'=>'Enter Article Title','value'=>set_value('title')]);?>
		    			</div>
		    		</div>
		    		<div class="col-md-6">
		    			<?php echo form_error('title');?>
		    		</div>
		    	</div>
		    	<div class="row">
			    	<div class="col-md-6">
			    		<div class="form-group">
		      				<label>Article Body</label>
		      					<?php echo form_textarea(['class'=>'form-control','name'=>'body','placeholder'=>'Article Body','value'=>set_value('body')]);?>
		    			</div>
			    	</div>
			    	<div class="col-md-6">
			    		<?php echo form_error('body');?>
			    	</div>
		    	</div>
		    	 <?php echo 	form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-danger']);
		    		echo	form_submit(['name'=>'Submit','value'=>'Submit','class'=>'btn btn-primary']);?>
		  </fieldset>
		</form>
	</div>
<?php include('admin_footer.php');?>