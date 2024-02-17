<?php
/**
 * Events Pro Countdown Widget
 * This is the template for the output of the event countdown widget.
 * All the items are turned on and off through the widget admin.
 * There is currently no default styling, which is highly needed.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/pro/widgets/countdown-widget.php
 *
 * @package TribeEventsCalendarPro
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

?>
<hr>
<div class="when">
	<?php $time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
	echo tribe_get_start_date( $event, false, 'l, F j', null ); ?> 
	<span>&nbsp;AT&nbsp;</span>
	<?php
	echo tribe_get_start_date( $event, false, $time_format );
	?>
</div>

<span class="title"><?php echo get_the_title( $event->ID ) ?></span>
<!-- <p>
	<?php echo get_the_excerpt($event->ID); ?>
</p> -->
<button class="button-primary"><a href="<?php the_field('ticket_link', $event->ID); ?>" target="_blank">Get Tickets</a></button>

<style>
	.tribe-countdown-text{display:none;}
</style>