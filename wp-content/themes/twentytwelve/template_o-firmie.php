<?php
/*
 Template name: O firmie
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

	<script type="text/javascript">
		jQuery(document).ready(function($){
			$('.right-column #toc_container').appendTo('.left-column #toc');
			$('.left-column .widget #toc_container').hide();
			$('.left-column .widget #contact-box #toc_container').hide();
			
			$('.widget_custom_post_widget').each(function(){
				$(this).find('img').addClass("inactive");
			
				var src = $(this).find('img').attr('src');
				
				$(this).css('background', 'url('+src+')');
			});
		})
	</script>
	<script type="text/javascript" src="/wp-content/themes/twentytwelve/js/slider-about.js"></script>
	
	<div class="content">		
		<div id="page-content">
			<div class="left-column">
				<div id="toc"></div>
				<?php dynamic_sidebar('left_about'); ?>
			</div>
			<div class="right-column">
				<div id="about-slider">
				    <?php
				    	if (have_rows('slides')) :
							echo '<ul>';
								while (have_rows('slides')) :
									the_row();
									$image =get_sub_field(slide);
									//echo '<img src="'.$image['url'].'" />';
									echo '<li style="background: url('.$image['url'].')">';
										echo '<p class="inactive slide-nr"></p>';
										echo '<div class="slide-desc">';
											echo get_sub_field(description);
										echo '</div>';
									echo '</li>';
								endwhile;
							echo '</ul>';
							
							echo '<div id="pagination">';
								echo '<a href="#" id="prev-slide">poprzedni</a>';
								echo '<a href="#" id="next-slide">następny</a>';
							echo '</div>';
						endif;
				    ?>
				</div>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>