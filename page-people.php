<?php get_header(); ?>
	
	<div id="content">
	
		<div id="inner-content" class="inner-content">
	
		    <main id="main" class="main row show-list people-list" role="main">
  		    <div class="columns"> 
    				<h1>People</h1>
    				
    				<form id="live-search" action="" class="styled" method="post">
                <fieldset>
                    <div class="row">
                      <div class="small-6 columns"><label class="text-left" for="filter">Search People:</label></div>
                      <div class="small-6 columns"><label class="text-right" id="filter-count"></label></div>
                    </div>
                    <input type="text" class="text-input" id="filter" value="" placeholder="Type here &hellip;" />
                    
                </fieldset>
                <hr>
            </form>
                				
    				<?php 
      				$args = array(
        				'post_type' => 'person',
        				'posts_per_page' => -1,
        				'order'   => 'ASC',
      				);
      				add_filter( 'posts_orderby' , 'posts_orderby_lastname' );
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
                        <?php  
                          $post_id = get_the_ID();
                          $actor = atdb_has_connection($post_id,'show_to_actor');
                          if($actor) { echo 'Actor ';
                          /*
                             $connected = get_posts( array(
                                  'connected_type' => 'show_to_actor',
                                  'connected_items' => $post_id,
                                  'nopaging' => true,
                                  )
                              );
                              if ( ! empty( $connected ) ) :
                                $shows = array();
                                 foreach($connected as $connection) {
                                   $shows[] = $connection->post_title;
                                 }
                                 print_r($shows);
                              endif;
                          */
                          }
                          
                          $creative = atdb_has_connection($post_id,'show_to_creative');
                          
                          if($creative && $actor) {
                            echo ', ';
                          }
                          
                          if($creative) {
                            $connected = get_posts( array(
                                  'connected_type' => 'show_to_creative',
                                  'connected_items' => $post_id,
                                  'nopaging' => true,
                                  )
                              );
                              if ( ! empty( $connected ) ) :
                                 $roles = array();
                                 foreach($connected as $connection) {
                                    $roles[] = p2p_get_meta( $connection->p2p_id, 'role', true );
                                 }
                                 $roles = array_unique($roles);
                                 
                                 $count = count($roles);
                                  for ($i = 0; $i < $count; $i++) {
                                     echo $roles[$i];
                                  
                                     if ($i < ($count - 1)) {
                                        echo ', ';
                                     }
                                  }
                              endif;
                          }
                          
                          $crew = atdb_has_connection($post_id,'show_to_crew');
                          if($crew) { echo 'Crew '; }
                          
                         ?>
                        
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