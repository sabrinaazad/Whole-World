<?php
/**
 * Events Pro Venue Widget
 * This is the template for the output of the venue widget.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/pro/widgets/venue-widget.php
 *
 * @version 4.4
 *
 * @package TribeEventsCalendarPro
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_plural = tribe_get_event_label_plural();
$events_label_plural_lowercase = tribe_get_event_label_plural_lowercase();

?>

<div class="secondary-slider">
	
	<?php if ( 0 === $events->post_count ): ?>
		<?php printf( __( 'No upcoming %s.', 'tribe-events-calendar-pro' ), $events_label_plural_lowercase ); ?>
	<?php else: ?>
	
		<?php do_action( 'tribe_events_venue_widget_before_the_list' ); ?>
			
			<?php while ( $events->have_posts() ): ?>
				<?php $events->the_post(); ?>
				      
				<div class="<?php tribe_events_event_classes() ?> ">
					<!-- <?php
					if (
						tribe( 'tec.featured_events' )->is_featured( get_the_ID() )
						&& get_post_thumbnail_id( get_the_ID() )
					) {	
						/**
						 * Allow the default post thumbnail size to be filtered
						 *
						 * @param $size
						 */
						
						$thumbnail_size = apply_filters( 'tribe_events_venue_widget_thumbnail_size', 'post-thumbnail' );
					}
					?> -->
						
					<div class="tribe-events-event-image img-wrapper">
	                  	<?php		
						$featured_image_link = apply_filters( 'tribe_events_list_widget_featured_image_link', true );
						$post_thumbnail      = get_the_post_thumbnail( null, $thumbnail_size );

						if ( $featured_image_link ) {
							$post_thumbnail = '<a href="' . esc_url( tribe_get_event_link() ) . '">' . $post_thumbnail . '</a>';
						}
						?>
						<div class="tribe-event-image">
							<?php
							// not escaped because it contains markup
							echo $post_thumbnail;
							?>
						</div>


					</div>

					<div class="slide-info">
	                  <span class="title"><?php echo get_the_title( get_the_ID() ) ?></span>
	                  <p>
						<?php do_action( 'tribe_events_before_the_content' ); ?>
							
							<?php echo the_excerpt(); ?>

						<?php do_action( 'tribe_events_after_the_content' ); ?>

						
	                  </p>
	                	
	                  <button class="button-primary"><a href="<?php the_field('ticket_link'); ?>" target="_blank">Get Tickets</a></button>
	             
	                </div>	
			
				</div>
			
			<?php endwhile; ?>
		
		<?php do_action( 'tribe_events_venue_widget_after_the_list' ); ?>

	<?php endif; ?>

</div>

