<?php get_header(); ?>
	
	<div id="content">
	
		<div id="inner-content" class="inner-content">
	
		    <main id="main" class="main row show-list people-list" role="main">
  		    <div class="columns"> 
    				<h1><?php the_title(); ?></h1>
    				<div class="card">  
              <?php the_content(); ?>						
            </div>
			    </div>					
        </main> <!-- end #main -->

		    <?php get_sidebar(); ?>
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>