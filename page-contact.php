<?php
    /*Borang Daftar Akaun
        Template Name: Contact

    */
?>
<?php get_header(); ?>

<section>
	<div class="wrapper">
		<?php the_content(); ?>
	</div>
</section>
<section>
	<div class="container main">
		<div class="row">

			<div class="col-xs-6 col-xs-offset-1" id="contactForm">
				
				 <?php get_template_part('template-parts/form', 'daftar'); ?>

			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
