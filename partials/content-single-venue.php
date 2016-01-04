<?php
/**
 * @package ATDB
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <small><a href="/venues/">&#8592; Back to Venues</a></small>
	<header class="entry-header">
  	
  	<?php
      if ( has_post_thumbnail() ) {
        the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
      }
    ?>
    <h1 class="h3">
      <?php the_title(); ?>
    </h1>
    <?php 
        $location = get_field('location');
        $address = $location['address'];
        $address = str_replace(', Australia', '', $address);
        echo $address;
      ?>
		<?php the_content(); ?>
		
	</header><!-- .entry-header -->
  <hr>
	<div class="entry-content"> 
		<div class="row"> 
  		<div class="small-12 columns">
    		<?php
          // Find connected pages
          $show = new WP_Query( array(
            'connected_type' => 'show_to_venue',
            'connected_items' => get_queried_object(),
            'nopaging' => true,
            'connected_orderby' => 'start',
            'connected_order' => 'desc'
          ) );
          if ( $show->have_posts() ) {
            echo '<table>';
            echo '<thead>';
              echo '<tr>';
               echo '<th>Productions</th>';
               echo '<th>Details</th>';
               echo '<th>Dates</th>';
              echo '<tr>';
            echo '</thead>';
            echo '<tbody>';
            while( $show->have_posts() ) { $show->the_post(); ?>
            <tr>
              <td><a href="<?php the_permalink(); ?>"><i><?php the_title(); ?></i></a></td>
              <td>
                <?php if(get_field('additional_title_info')) { 
                  echo ' '. get_field('additional_title_info'); } 
                ?>
              </td>
              <td>
                <?php
                  $start = p2p_get_meta( get_post()->p2p_id, 'start', true ); 
                  if($start) {
                    echo date("j M Y", strtotime($start));
                  }
                  $end = p2p_get_meta( get_post()->p2p_id, 'end', true ); 
                  if($end) {
                    echo ' - '.date("j M Y", strtotime($end));
                  }
                  ?>
                </td>
            </tr>
          <?php 
            }
            echo '</tbody>';
            echo '</table>';
          } wp_reset_postdata(); ?>
            <div class="small reveal" id="venue-form" data-reveal>
              <h3><?php the_title(); ?></h3>
              <p>Update details</p>
              <?php 
                gravity_form(4, false, false, false, '', true); 
                gravity_form_enqueue_scripts( 4, true );
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
