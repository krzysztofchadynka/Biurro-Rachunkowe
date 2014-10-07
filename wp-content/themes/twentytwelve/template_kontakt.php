<?php
/*
 Template name: Kontakt
 */
?>
<?php get_header(); ?>
	<div class="content">
		<div class="left-column">
			<div id="left-content">
				<?php dynamic_sidebar('left'); ?>
			</div>
		</div>
		<div class="right-column">
			<?php dynamic_sidebar('right'); ?>
		</div>
	</div>
<?php get_footer(); ?>