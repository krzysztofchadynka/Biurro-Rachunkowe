<?php
/*
 Template name: Strona główna
 */
?>

<?php get_header(); ?>

<script type="text/javascript">
	jQuery(window).scroll(function(){
		var iCurScrollPos = jQuery(this).scrollTop();
		
		if (iCurScrollPos > 160)
		{
			jQuery('header#masthead').addClass("header-active");
		}
		else if (iCurScrollPos <= 10)
			jQuery('header#masthead').removeClass("header-active");
	})
</script>

<div id="content">
	<div class="box-columns">
		<?php
			if (have_rows('baner')):
				while (have_rows('baner')) :
					the_row();
					
					echo '<div class="box-column">';
						echo '<div class="box-content">';
							echo get_sub_field(tekst);
						echo '</div>';
						echo '<div class="box-image">';
							$image =get_sub_field(zdjecie);
							echo '<img src="'.$image.'" />';
						echo '</div>';
					echo '</div>';
				endwhile; 
			else:
			endif;
		?>
	</div>
</div>

<?php get_footer(); ?>