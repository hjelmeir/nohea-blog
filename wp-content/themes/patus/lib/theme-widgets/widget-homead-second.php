<?php $secondhomead = of_get_option('uxde_second_home'); ?>
<?php if($secondhomead == '') :?>
<?php else: ?>
<div id="home-ad" class="clearfix">
	<?php echo $secondhomead; ?>
</div>
<?php endif; ?>