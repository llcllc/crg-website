<?php // oroginally copied from page.php
	while (have_posts()) : the_post(); ?>

	<div class="page-header">
  <?php get_template_part('templates/page', 'header'); ?>
	</div>
  <?php get_template_part('templates/content', 'page'); ?>

  <div class ="gray-arrow">
	  <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
  </div>

  <div class="container-fluid">

	<div class="row">
		<!--   Mailing   List-->  <div   class="col-xs-12">
			 <div class="mailing-list-form">
				 <?php get_template_part('templates/form-newsletter');  ?>
			 </div>
		 </div>
	</div>

	<div class="row">
		<!--  address -->  <div   class="col-xs-12 col-sm-6 col-md-4">
			 <div class="address">
				 195 Chrystie Street. New York, NY. 10002<br>
				 T - 212 229 2766<br>
				 info@crggallery.com<br>
				 <br>
			 </div>
		 </div>

		<!--  google map -->  <div   class="col-xs-12 col-sm-6 col-md-4">
			 <div class="google-map">

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.813938211398!2d-73.99432128539928!3d40.72211227933079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259c7f0a4a6d1%3A0xeecfca023ef23f1b!2sCRG+Gallery!5e0!3m2!1sen!2sus!4v1472579612493" width=100% height=100% frameborder="0" style="border:0" allowfullscreen></iframe>

			 </div>
		 </div>

		<!--   hours-->  <div   class="col-xs-12 col-md-4">
			 <div class="hours">

			<?php
			   $post = get_page(48);
			   $content = apply_filters('the_content', $post->post_content);
			   echo $content;
			?>

			 </div>
		 </div>
	</div>

	<div class="row">
		<!--   social media-->  <div   class="col-xs-12">
			 <div class="social-media">
				 	<a href="https://www.facebook.com/CRG-Gallery-17349246246/" target="_blank">
						<img src="<?= get_template_directory_uri() . '/assets/images/social/fb.png'; ?>">
					</a>
					<a href="hhttps://twitter.com/intent/follow?source=followbutton&variant=1.0&screen_name=CRGGallery" target="_blank">
						<img src="<?= get_template_directory_uri() . '/assets/images/social/twitter.png'; ?>">
					</a>
					<a href="https://www.instagram.com/crggallery/" target="_blank">
						<img src="<?= get_template_directory_uri() . '/assets/images/social/instagram.png'; ?>">
					</a>
					<a href="http://crggallery.tumblr.com/" target="_blank">
						<img src="<?= get_template_directory_uri() . '/assets/images/social/tumblr.png'; ?>">
					</a>
			 </div>
		 </div>
	</div>

 </div>


<?php endwhile; ?>
