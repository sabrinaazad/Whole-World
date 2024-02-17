<?php
/**
* Template Name: Simple Content
* The template for the simple content pages
*/

get_header();
?>
<div class="content-page">
  <section id="section1" class="section1">
    <div class="container">
    	<div class="row">
    		<div class="col-12">
          <div class="wrapper">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
    		</div>
    	</div>
    </div>
  </section>
</div>
<?php get_footer(); ?>