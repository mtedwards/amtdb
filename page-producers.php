<?php get_header(); ?>
	
	<div id="content">
	
		<div id="inner-content" class="inner-content">
	
		  <main id="main" class="main row show-list" role="main">
  		  <div class="columns">
				  <h1>Producers</h1>
  				<?php 
    				$args = array(
      				'post_type' => 'producer',
      				'posts_per_page' => -1,
      				'orderby' => 'title',
      				'order' => 'ASC'
    				);
    				$the_query = new WP_Query( $args );
    				// The Loop
    				if ( $the_query->have_posts() ) { ?>
  
      				<?php
      				while ( $the_query->have_posts() ) { 
        				$the_query->the_post(); ?>
        				<a class="media-object" href="<?php the_permalink(); ?>">
                  <div class="media-object-section">
                    <?php if ( has_post_thumbnail() ) { ?>
                    <div class="thumbnail">
                      <?php
                        the_post_thumbnail('thumbnail');
                      ?>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="media-object-section">
                      <h1 class="h5"><?php the_title(); ?></h5>
                  </div>
                </a>
  			      <?php } ?>
  			    <?php } ?>							
			   </div>			
			</main> <!-- end #main -->

		    <?php get_sidebar(); ?>
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>