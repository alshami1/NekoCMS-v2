<?php
foreach($contents as $comment):
?>
<p><i class="fa fa-comments"></i> Comment By: <?php echo $comment['name'];?></p>
<p><i class="fa fa-calendar"></i> Date Commented: <?php echo date('F j, Y',strtotime($comment['comment_date'])); ?></p>
<p><i class="fa fa-pencil"></i> Comment for: <?php echo $comment['title']; ?></p>
<br>
	<div>
	<?php  echo $comment['comment']; ?>
	</div>
<?php
endforeach;
?>