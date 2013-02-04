<?php $firsthomead = of_get_option('uxde_first_home'); ?>
<?php if($firsthomead == '') :?>
<?php else: ?>
<div id="home-ad" class="clearfix">
	<?php echo $firsthomead; ?>
</div>
<?php endif; ?>