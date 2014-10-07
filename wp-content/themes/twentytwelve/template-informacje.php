<?php
/*
 Template name: Informacje i aktualności
 */
?>
<?php get_header(); ?>

	<div class="content">
		<div id="news-content">
			<div class="info-block" id="tax-scale">
				<h2>Skala podatkowa</h2>
				<?php dynamic_sidebar('tax-scale'); ?>
			</div>
			<div class="info-block" id="documents">
				<h2>Dokumenty</h2>
			</div>
			<div class="info-block" id="zus">
				<h2>ZUS</h2>
			</div>
		</div>
	</div>

<?php get_footer(); ?>