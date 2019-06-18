<?php include('public_header.php');?>
<div class="container">
	<h1>Search Results</h1>
	<table style="width : 100%" class="table">
		<thead>
			<tr>
				<th>Sr. No.</th>
				<th>Article Title</th>
				<th>Publish On</th>
			</tr>
		</thead>
		<tbody>
			<tr><?php if(count($articles)):?>
				<?php $count= $this->uri->segment(4,0);?>
				<?php foreach($articles as $article):?>
				<td><?= ++$count;?></td>
				<td><?= $article->title;?></td>
				<td><?= 'Date'?></td>
			</tr>
				<?php endforeach;?>
				<?php else:?>
				<td colspan="3">No records Found.</td>
				<?php endif; ?>
		</tbody>
	</table>
	<?php echo $this->pagination->create_links();?>
</div>
<?php include('public_footer.php');?>