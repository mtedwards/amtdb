<?php get_header(); ?>
			
<div id="content">

	<div id="inner-content" class="inner-content">

		<main id="main" class="main row" role="main">
		  <div class="columns"> 
  		    
		    <?php if (have_posts()) : while (have_posts()) : the_post(); 
		
		    	$postType = get_post_type( get_the_ID() );
  			
      			if ( $postType == 'show' ) {
      			  get_template_part( 'partials/content', 'single-show' );
            } elseif ( $postType == 'person' ) {  
      			  get_template_part( 'partials/content', 'single-person' );
      			} elseif ( $postType == 'producer' ) {  
      			  get_template_part( 'partials/content', 'single-producer' );
      			} elseif ( $postType == 'venue' ) {  
      			  get_template_part( 'partials/content', 'single-venue' );
      			} else { 
      			  get_template_part( 'partials/content', 'single' );
      			}
      			?>
		    	
		    <?php endwhile; else : ?>
		
		   		<?php get_template_part( 'partials/content', 'missing' ); ?>

		    <?php endif; ?>

		  </div>
		</main> <!-- end #main -->

		<?php get_sidebar(); ?>

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>