<?php
/**
 * @package ATDB
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <small><a href="/shows/">&#8592; Back to Shows</a></small>
	<header class="entry-header">
  	
  	<div class="media-object">
      <div class="media-object-section">
        <div class="thumbnail">
          <?php
           if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); }
          ?>	
        </div>
      </div>
      <div class="media-object-section">
        <h1 class="h3"><i><?php the_title(); if(get_field('additional_title_info')) { echo ' '. get_field('additional_title_info'); } ?></i></h1>
        <?php $endDate = get_field('end_date'); ?>
    
		<p><b>From:</b> <?php echo date("j M Y", strtotime(get_field('start_date'))); ?> 
		<?php if($endDate){ ?> <b>To:</b> <?php echo date("j M Y", strtotime($endDate)); }?>
		<?php 
  		$website = get_field('website');
  		if($website){
    		echo '<br/><b>Website:</b> <a class="dont-break-out" href="'.$website.'" target="_blank">'.str_replace("http://", "", $website).'</a>';
  		}
    ?>
    </p>
      </div>
    </div>
    
    
		<?php the_content(); ?>
		
	</header><!-- .entry-header -->
  <hr>
	<div class="entry-content">
		<div class="row">
  		<div class="small-12 medium-6 columns">
    		<h4>Producers</h4>
    		<?php
          // Find connected pages
          $producers = new WP_Query( array(
            'connected_type' => 'show_to_producer',
            'connected_items' => get_queried_object(),
            'nopaging' => true,
          ) );
          if ( $producers->have_posts() ) {
            echo '<table>';
            while( $producers->have_posts() ) { $producers->the_post(); ?>
            <tr><td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td></tr>
          <?php 
            }
            echo '</table>';
          }   
        ?>
  		</div>
  		<div class="small-12 medium-6 columns">
    		<h4>Tour</h4>
    		<?php
          // Find connected pages
          $tour = new WP_Query( array(
            'connected_type' => 'show_to_venue',
            'connected_items' => get_queried_object(),
            'nopaging' => true,
          ) );
          if ( $tour->have_posts() ) {
            echo '<table>';
            while( $tour->have_posts() ) { $tour->the_post(); ?>
            <tr>
              <td><a href="<?php the_permalink(); ?>"><?php the_title(); ?>, <?php the_field('state'); ?></a></td>
              <td>
                <?php 
                  $start = p2p_get_meta( get_post()->p2p_id, 'start', true ); 
                  if($start) {
                    echo date("j M Y", strtotime($start));
                  }
                ?>
              </td>
              <td>
                <?php
                  $end = p2p_get_meta( get_post()->p2p_id, 'end', true ); 
                  if($end) {
                    echo date("j M Y", strtotime($end));
                  }
                  ?>
              </td>
            </tr>
            <?php }
              echo '</table>';
              } ?>
  		</div>
		</div>
		<hr>  
		<div class="row"> 
  		<div class="columns">
    		<?php
            // Find connected pages
            $cast = new WP_Query( array(
              'connected_type' => 'show_to_actor',
              'connected_items' => get_queried_object(),
              'nopaging' => true,
            ) );
            if ( $cast->have_posts() ) {
              echo '<h4>Cast:</h4>'; ?>
              <table>
                <thead>
                  <tr>
                    <th>Actor</th>
                    <th>Role</th>
                  </tr>
                </thead>
                <tbody> 
                  <?php while( $cast->have_posts() ) { $cast->the_post();
                    
                    $notes = p2p_get_meta( get_post()->p2p_id, 'notes', true );
                    
                    echo '<tr>';
                      echo '<td><a href="'.get_the_permalink().'">'.get_the_title().'</a></td>';
                      echo '<td>'.p2p_get_meta( get_post()->p2p_id, 'role', true );
                      if($notes) {
                        echo ' ('.$notes.')';
                      }
                      echo'</td>';
                    echo '</tr>';
                  } ?>
                </tbody>
              </table>
            <?php } wp_reset_postdata(); ?>
          </div>
          <div class="columns">
    		    		<?php
            // Find connected pages
            $creative = new WP_Query( array(
              'connected_type' => 'show_to_creative',
              'connected_items' => get_queried_object(),
              'nopaging' => true,
            ) );
            if ( $creative->have_posts() ) {
              echo '<h4>Creatives:</h4>'; ?>
              <table>
                <thead> 
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                  </tr>
                </thead>
                <tbody> 
                  <?php while( $creative->have_posts() ) { $creative->the_post();
                    $notes = p2p_get_meta( get_post()->p2p_id, 'notes', true );
                    echo '<tr>';
                      echo '<td><a href="'.get_the_permalink().'">'.get_the_title().'</a></td>';
                      echo '<td>'.p2p_get_meta( get_post()->p2p_id, 'role', true );
                        if($notes) {
                          echo ' ('.$notes.')';
                        }
                      echo'</td>';
                    echo '</tr>';
                  }  ?>
              </table>
              </tbody>
              <hr>
            <?php } wp_reset_postdata(); ?>
            <div class="small reveal" id="show-form" data-reveal>
              <h3><?php the_title(); ?></h3>
              <p>Update details</p>
              <?php 
                gravity_form(2, false, false, false, '', true); 
                gravity_form_enqueue_scripts( 2, true );
              ?>
              <button class="close-button" data-close aria-label="Close reveal" type="button">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
  		</div>

      <div class="columns">
    		    		<?php
            // Find connected pages
            $crew = new WP_Query( array(
              'connected_type' => 'show_to_crew',
              'connected_items' => get_queried_object(),
              'nopaging' => true,
            ) );
            if ( $crew->have_posts() ) {
              echo '<h4>Crew:</h4>'; ?>
              <table>
                <thead> 
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                  </tr>
                </thead>
                <tbody> 
                  <?php while( $crew->have_posts() ) { $crew->the_post();
                    $notes = p2p_get_meta( get_post()->p2p_id, 'notes', true );
                    echo '<tr>';
                      echo '<td><a href="'.get_the_permalink().'">'.get_the_title().'</a></td>';
                      echo '<td>'.p2p_get_meta( get_post()->p2p_id, 'role', true );
                        if($notes) {
                          echo ' ('.$notes.')';
                        }
                      echo'</td>';
                    echo '</tr>';
                  }  ?>
              </table>
              </tbody>
              <hr>
            <?php } wp_reset_postdata(); ?>
            <div class="small reveal" id="show-form" data-reveal>
              <h3><?php the_title(); ?></h3>
              <p>Update details</p>
              <?php 
                gravity_form(2, false, false, false, '', true); 
                gravity_form_enqueue_scripts( 2, true );
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
