<?php
/**
* Template Name: Shows
* The template for the shows page
*/

            if ( ! defined( 'ABSPATH' ) ) {
              die( '-1' );
            }

get_header();
?>
<div class="shows">
  <section id="section1" class="section1">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div id="tribe-events-pg-template" class="tribe-events-pg-template wrapper">
              <?php tribe_events_before_html(); ?>
              <?php tribe_get_view(); ?>
              <?php tribe_events_after_html(); ?>
            </div>
        </div>
      </div>
  </section>
</div>
<?php get_footer(); ?>