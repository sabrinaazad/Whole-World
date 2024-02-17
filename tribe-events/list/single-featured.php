<?php
/**
 * List View Single Featured Event
 * This file contains one featured event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-featured.php
 *
 * @version 4.6.19
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_plural = tribe_get_event_label_plural();
$events_label_plural_lowercase = tribe_get_event_label_plural_lowercase();

$posts = tribe_get_list_widget_events();

// Check if any event posts are found.
if ( $posts ) : ?>

	<div class="tribe-list-widget">
		<?php
		// Setup the post data for each event.
		foreach ( $posts as $post ) :
			setup_postdata( $post );
			?>
			<span class="tribe-events-list-widget-events <?php tribe_events_event_classes() ?>">
				<?php
				if (
					tribe( 'tec.featured_events' )->is_featured( get_the_ID() )
					&& get_post_thumbnail_id( $post )
				) {
					/**
					 * Fire an action before the list widget featured image
					 */
					do_action( 'tribe_events_list_widget_before_the_event_image' );

					/**
					 * Allow the default post thumbnail size to be filtered
					 *
					 * @param $size
					 */
					$thumbnail_size = apply_filters( 'tribe_events_list_widget_thumbnail_size', 'post-thumbnail' );

					/**
					 * Filters whether the featured image link should be added to the Events List Widget
					 *
					 * @since 4.5.13
					 *
					 * @param bool $featured_image_link Whether the featured image link should be added or not
					 */
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
					<?php

					/**
					 * Fire an action after the list widget featured image
					 */
					do_action( 'tribe_events_list_widget_after_the_event_image' );
				}
				?>	

				<hr>
				<?php do_action( 'tribe_events_list_widget_before_the_meta' ) ?>
				<!-- Event Time -->
				<div class="tribe-event-duration when">
					<!-- <?php echo tribe_events_event_schedule_details(); ?> -->
					<?php 

					$time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );


					echo tribe_get_start_date( null, false, 'l, F j', null ); ?> 
					<span>&nbsp;AT&nbsp;</span>
					<?php
					echo tribe_get_start_date( null, false, $time_format );
					 ?>
				</div>

				<?php do_action( 'tribe_events_list_widget_after_the_meta' ) ?>



				<?php do_action( 'tribe_events_list_widget_before_the_event_title' ); ?>
				<!-- Event Title -->
				<h4 class="tribe-event-title where">
					<?php the_title(); ?>
				</h4>
				<?php do_action( 'tribe_events_list_widget_after_the_event_title' ); ?>
				
				<p class="tribe-events-widget-link">
					<button class="button-primary"><a href="#">&nbsp;BUY TICKETS</a></button>
				</p>
	
			</span>
		<?php
		endforeach;
		?>
	</div><!-- .tribe-list-widget -->

	

<?php
// No events were found.
else : ?>
	<p><?php printf( esc_html__( 'There are no upcoming %s at this time.', 'the-events-calendar' ), $events_label_plural_lowercase ); ?></p>
<?php
endif;
