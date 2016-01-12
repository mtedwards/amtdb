<aside class="sidebar">
  <div class="row">
    <div class="columns"> 

		<?php if ( is_singular('person') ) { ?>
      <small>Are you <?php the_title(); ?>?</small>
      <a class="button expanded" data-toggle="person-form" id="form-launch">Add / Update Details</a>
    <?php } ?>
    
    <?php if ( is_singular('show') ) { ?>
      <small>Help us keep up to date:</small>
      <a class="button expanded" data-toggle="show-form" id="form-launch">Add / Update Details</a>
    <?php } ?>
    
    <?php if ( is_page('shows') ) { ?>
      <small>Help us keep up to date:</small>
      <a class="button expanded" href="/add-a-show" id="form-launch">Add a Show</a>
    <?php } ?>
    
    <?php if ( is_singular('producer') ) { ?>
      <small>Associated with<br><?php the_title(); ?>?</small>
      <a class="button expanded" data-toggle="producer-form" id="form-launch">Add / Update Details</a>
    <?php } ?>
    
    <?php if ( is_singular('venue') ) { ?>
      <small>Associated with<br><?php the_title(); ?>?</small>
      <a class="button expanded" data-toggle="venue-form" id="form-launch">Add / Update Details</a>
    <?php } ?>
    
    <?php $tag = get_field('at_tag'); 
      if($tag && is_single()) {
    ?>
    <div class="widget">  
      <b><small>Latest AussieTheatre Articles on:</small></b>
      <h6><?php the_title(); ?></h6>
      <div class="at-feed" id="at-feed" data-tag="<?php echo $tag; ?>"></div>
    </div>
    <?php } ?>
    
    <div class="medrec">
			<!-- /6993171/Home_Side_1 -->
      <div class="ad_unit" id='div-gpt-ad-1446367825709-0'>
        <small>Advertisement</small>
        <script type='text/javascript' >
          googletag.cmd.push(function() { googletag.display('div-gpt-ad-1446367825709-0'); });
        </script>
      </div>
	  </div>
	  
	  <div class="widget">
  	  <b><small>Latest Articles from:</small></b>
      <h6>AussieTheatre.com</h6>
      <div class="at-feed" id="at-latest">
        <p class="loading">Loading Articles</p>
      </div>
	  </div>


			<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>

        <?php dynamic_sidebar( 'sidebar-1' ); ?>

      <?php } ?>

		
		

			<!-- Home_Side_2 -->
			<div class="medrec" >
				<div class="ad_unit" id='div-gpt-ad-1353323304334-4'>
  		  <small>Advertisement</small>
				<script type='text/javascript'>
				googletag.cmd.push(function() { googletag.display('div-gpt-ad-1353323304334-4'); });
				</script>
				</div>
			</div>

<!--
			<?php if ( is_active_sidebar( 'sidebar3' ) ) { ?>

        <?php dynamic_sidebar( 'sidebar3' ); ?>

      <?php } ?>
      
		<div class="medrec med_3_side" data-set="med_3">
			

				<div class="ad_unit med_3_unit"  id='div-gpt-ad-1353323304334-5'>
					<small>Advertisement</small>
					<script type='text/javascript'>
					googletag.cmd.push(function() { googletag.display('div-gpt-ad-1353323304334-5'); });
					</script>
				</div>
		</div>
-->
		      
    </div>
  </div>
</aside>