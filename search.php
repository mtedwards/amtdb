<?php get_header(); ?>
	
	<div id="content">
	
		<div id="inner-content" class="inner-content">
	
		    <main id="main" class="main row show-list people-list" role="main">
  		    <div class="columns"> 
    				<h1>Search for:<?php the_title(); ?></h1>
    				 
              <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                  <div class="card"> 
                    <h3><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h3>
                    <?php the_excerpt(); ?>
                  </div>
                  <hr>
                <?php endwhile; ?>					
			    </div>					
        </main> <!-- end #main -->

		    <?php get_sidebar(); ?>
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>