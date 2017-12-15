<?php
/*
Event Espresso Event Page
*/

get_header();

// Start of the wrapper
ventcamp_page_wrapper_start();
?>

<div class="container eespresso-container">
	<div id="espresso-event-details-wrap-dv" class="">
		<div id="espresso-event-details-dv" class="" >
				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();
						//  Include the post TYPE-specific template for the content.
						espresso_get_template_part( 'content', 'espresso_events' );
						// If comments are open or we have at least one comment, load up the comment template.
						/*
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
						*/
					endwhile;
				?>
		</div>
	</div>
</div>
<?php
// End of the wrapper
ventcamp_page_wrapper_end();

get_footer();
