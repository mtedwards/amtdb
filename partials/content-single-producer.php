<?php
/**
 * @package ATDB
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <small><a href="/producers/">&#8592; Back to Producers</a></small>
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
          $producers = new WP_Query( array(
            'connected_type' => 'show_to_producer',
            'connected_items' => get_queried_object(),
            'nopaging' => true,
          ) );
          if ( $producers->have_posts() ) {
            
             echo '<table>';
            echo '<thead>';
              echo '<tr>';
               echo '<th>Productions</th>';
               echo '<th>Details</th>';
              echo '<tr>';
            echo '</thead>';
            echo '<tbody>';
            while( $producers->have_posts() ) { $producers->the_post();  ?>
            <tr>
              <td><a href="<?php the_permalink(); ?>"><i><?php the_title(); ?></i></a></td>
              <td>
                <?php if(get_field('additional_title_info')) { 
                  echo ' '. get_field('additional_title_info'); } 
                ?>
              </td>
            </tr>
          <?php 
            }
            echo '</tbody>';
            echo '</table>';
          } wp_reset_postdata();  
        ?>
        <div class="small reveal" id="producer-form" data-reveal>
              <h3><?php the_title(); ?></h3>
              <p>Update details</p>
              <?php 
                gravity_form(3, false, false, false, '', true); 
                gravity_form_enqueue_scripts( 3, true );
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
