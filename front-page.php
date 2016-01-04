<?php get_header(); ?>
	
	<div id="content">
	
		<div id="inner-content" class="inner-content">
	
		    <main id="main" class="main show-list" role="main">
		      <div class="columns"> 
    				<?php 
      				$args = array(
        				'post_type' => 'show',
        				'order'     => 'DESC',
                'meta_key' => 'start_date',
                'orderby'   => 'meta_value', //or 'meta_value_num'
                'meta_query' => array( 
                  'key'   => 'now_playing',
                  'value' => '1'
                )
      				);
      				
      				$the_query = new WP_Query( $args );
      				// The Loop
      				if ( $the_query->have_posts() ) { ?>
      				<div class="show-list">
        				<h3>Currently Playing</h3>
        				<?php
        				while ( $the_query->have_posts() ) { 
          				$the_query->the_post(); ?>
                  <a class="media-object" href="<?php the_permalink(); ?>">
                    <div class="media-object-section">
                      <div class="thumbnail">
                        <?php
                         if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); }
                        ?>
                      </div>
                    </div>
                    <div class="media-object-section">
                        <h1 class="h5"><i><?php the_title(); if(get_field('additional_title_info')) { echo ' '. get_field('additional_title_info'); } ?></i></h1>
                        <?php $endDate = get_field('end_date'); ?>  
                        
                    		<p>
                      		<b>From:</b> <?php echo date("j M Y", strtotime(get_field('start_date'))); ?> <br>
                        <?php
                          // Find connected pages
                          $connected = new WP_Query( array(
                              'connected_type' => 'show_to_venue',
                              'connected_items' => $post,
                              'nopaging' => true,
                              'posts_per_page' => 1
                          ) );
                          $i = 1;
                          while ( $connected->have_posts() ) : $connected->the_post();
                          
                            $start = p2p_get_meta( get_post()->p2p_id, 'start', true );
                            $start = str_replace('-', '', $start);
                            
                            $end = p2p_get_meta( get_post()->p2p_id, 'end', true );
                            $end = str_replace('-', '', $end);
                            $today = date('Ymd');
                            
                            if ($end > $today && $i == 1) {
                              echo get_the_title().', '.get_field('state');
                              $i++;
                            }
                          endwhile;
                      
                          wp_reset_postdata(); // set $post back to original post
                          ?>
                          
                        </p>
                        
                    </div>
                  </a>			      
                <?php } ?>
      				</div>
    			   <?php } ?>							
		    </div>
			</main> <!-- end #main -->

		    <?php get_sidebar(); ?>
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>