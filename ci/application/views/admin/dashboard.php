<?php include('admin_header.php');?>

<div class="container"><br>
	<?php if($error =$this->session->flashdata('feedback')):?>
	    	<div class="row">
	    		<div class="col-md-6">
	    			<div class="alert alert-success <?php echo $this->session->flashdata('feedback_class');?>">
	    				<?= $error;?>
	    			</div>
	    		</div>
	    	</div>
	    <?php endif;?>
	<a href="<?php echo base_url('admin/store_article')?>" class="btn btn-success" style="float: right;">Add Article</a>
	<table class="table" style="width: 100%;">
		<thead>
			<th>Sr. No.</th>
			<th>Title</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php if(count($articles)):
			 $count = $this->uri->segment(3);?>
				<?php foreach($articles as $article):  ?>
			<tr>
				<td><?php echo ++$count;?></td>
				<td>
					<div class="location" id="<?php echo $article->id?>"><?php echo $article->title?></div>
				</td>
				<td>
					<div class="row">
						<div class="col-md-2">
							<?php echo anchor("admin/edit_article/{$article->id}",'Edit',['class'=>'btn btn-primary']);?> <!-- this is using GET method -->
						</div>
						<div class="col-md-2">
							<?=  form_open('admin/delete_article'),
									form_hidden('article_id',$article->id),
									form_submit(['name'=>'Submit','value'=>'Delete','class'=>'btn btn-danger']),
									form_close();
							?> <!-- this id done using POST method -->
						</div>
					</div>
				</td>
			</tr>
		<?php endforeach;?>
		<?php else:?>
			<tr>
				<td colspan="3">
					no records found.
				</td>
			</tr>
		<?php endif;?>
		</tbody>
	</table>
	<script
  src="https://code.jquery.com/jquery-3.4.0.min.js"
  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  crossorigin="anonymous"></script>
	<?php echo $this->pagination->create_links();?>
<script type="text/javascript">
	$(".location").on("click",function(){
		id1 = $(this).attr("id") 
		console.log(id1);
		 window.location.assign("<?= base_url('admin/show_article/')?>"+id1);
	});
</script>

<?php include('admin_footer.php');?>