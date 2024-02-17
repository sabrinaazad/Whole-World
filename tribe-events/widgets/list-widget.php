<?php
/**
 * Events List Widget Template
 * This is the template for the output of the events list widget.
 * All the items are turned on and off through the widget admin.
 * There is currently no default styling, which is needed.
 *
 * This view contains the filters required to create an effective events list widget view.
 *
 * You can recreate an ENTIRELY new events list widget view by doing a template override,
 * and placing a list-widget.php file in a tribe-events/widgets/ directory
 * within your theme directory, which will override the /views/widgets/list-widget.php.
 *
 * You can use any or all filters included in this file or create your own filters in
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters (TO-DO)
 *
 * @version 4.5.13
 * @return string
 *
 * @package TribeEventsCalendar
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



<div id="panel" class="container">
  <div class="marquee">
    <ul class="content">
      <?php
		// Setup the post data for each event.
		foreach ( $posts as $post ) :
			setup_postdata( $post );
			?>
			<li class="tribe-events-list-widget-events <?php tribe_events_event_classes() ?>">

				<?php do_action( 'tribe_events_list_widget_before_the_event_title' ); ?>
				<!-- Event Title -->
				<h4 class="tribe-event-title where">
					<?php the_title(); ?>
				</h4>
				<?php do_action( 'tribe_events_list_widget_after_the_event_title' ); ?>
				
				<?php do_action( 'tribe_events_list_widget_before_the_meta' ) ?>
				<!-- Event Time -->
				<div class="tribe-event-duration when">
					<?php 

					$time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );

					echo tribe_get_start_date( null, false, 'l, F j', null ); ?> 
					<span>&nbsp;AT&nbsp;</span>
					<?php
					echo tribe_get_start_date( null, false, $time_format );
					 ?>
				</div>

				<?php do_action( 'tribe_events_list_widget_after_the_meta' ) ?>

			<p class="tribe-events-widget-link">
				<button class="button-primary"><a href="<?php the_field('ticket_link'); ?>" target="_blank">&nbsp;Get Tickets</a></button>
			</p>
	
			</li>
		<?php
		endforeach;
		?>
    </ul>
  </div>
</div>
   

<?php
// No events were found.
else : ?>
	<p><?php printf( esc_html__( 'There are no upcoming %s at this time.', 'the-events-calendar' ), $events_label_plural_lowercase ); ?></p>
<?php
endif;
