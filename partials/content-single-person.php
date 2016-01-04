<?php
/**
 * @package ATDB
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <small><a href="/people/">&#8592; Back to People</a></small>
	<header class="entry-header">
  	
  	<?php
      if ( has_post_thumbnail() ) {
        the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
      }
    ?>
    <h1 class="h3">
      <?php the_title(); ?>
    </h1>
		<?php the_content(); ?>
		
	</header><!-- .entry-header -->
  <hr>
	<div class="entry-content"> 
		<div class="row"> 
  		<div class="small-12 columns">
    		<?php
            // Find connected pages
            $cast = new WP_Query( array(
              'connected_type' => 'show_to_actor',
              'connected_items' => get_queried_object(),
              'nopaging' => true,
              'post_status' => 'any'
            ) );
            if ( $cast->have_posts() ) {
              echo '<h4>Performance Resume:</h4>'; ?>
              <table>
                <thead>
                  <tr>
                    <th>Show</th>
                    <th>Role</th>
                    <th>Year</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while( $cast->have_posts() ) { $cast->the_post();
                    
                    $notes = p2p_get_meta( get_post()->p2p_id, 'notes', true );
                    
                    $startDate = get_field('start_date');
                    $start = date("Y", strtotime($startDate));
                    
                    $endDate = get_field('end_date');
                    $end = date("Y", strtotime($endDate));
                    
                    if($start == '1970') {
                      $year = "TBC";
                    } elseif($start == $end) {
                      $year = $start;
                    } elseif($end == '1970') {
                      $year = $start . ' to Current';
                    } else {
                      $year = $start . ' / ' . $end; 
                    }
                    
                    echo '<tr>';
                      if ( get_post_status() == 'publish' ) {
                    		echo '<td><a href="'.get_the_permalink().'">'.get_the_title().'</a></td>';
                    	} else {
                    		echo '<td>'.get_the_title().'</td>';
                    	}
                      echo '<td>'.p2p_get_meta( get_post()->p2p_id, 'role', true );
                      if($notes) {
                        echo ' ('.$notes.')';
                      }
                      echo'</td>';
                      echo '<td>'.$year.'</td>';
                    echo '<tr>';
                  } ?>
                </tbody>
              </table>
            <?php } 
              wp_reset_postdata();
            ?>
            
            <?php
            // Find connected pages
            $creative = new WP_Query( array(
              'connected_type' => 'show_to_creative',
              'connected_items' => get_queried_object(),
              'nopaging' => true,
            ) );
            if ( $creative->have_posts() ) {
              echo '<h4>Creative Resume:</h4>'; ?>
              <table>
                  <thead>
                  <tr>
                    <th>Show</th>
                    <th>Position</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while( $creative->have_posts() ) { $creative->the_post();
                    
                    $notes = p2p_get_meta( get_post()->p2p_id, 'notes', true );
                    
                    echo '<tr>';
                      if ( get_post_status() == 'publish' ) {
                    		echo '<td><a href="'.get_the_permalink().'">'.get_the_title().'</a></td>';
                    	} else {
                    		echo '<td>'.get_the_title().'</td>';
                    	}
                      echo '<td>'.p2p_get_meta( get_post()->p2p_id, 'role', true );
                      if($notes) {
                        echo ' ('.$notes.')';
                      }
                      echo'</td>';
                    echo '<tr>';
                  } ?>
                </tbody>
              </table>
            <?php }
                wp_reset_postdata();
               ?>
            
            <?php 
              global $post;
              $tag = $post->post_name; 
            ?>            
            <div class="card">  
              <b><small>Latest AussieTheatre Articles on:</small></b>
              <h6><?php the_title(); ?></h6>
              <div class="at-feed" id="at-feed" data-tag="<?php echo $tag; ?>"></div>
            </div>
            <div class="small reveal" id="person-form" data-reveal>
              <h3>Are you <?php the_title(); ?>?</h3>
              <p>Update your details</p>
              <?php 
                gravity_form(1, false, false, false, '', true); 
                gravity_form_enqueue_scripts( 1, true );
              ?>
              <button class="close-button" data-close aria-label="Close reveal" type="button">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

  		</div>
		</div>

      <?php
      wp_reset_postdata();
      
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'atdb' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
