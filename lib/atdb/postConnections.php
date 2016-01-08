<?php
  /* Connect Shows and People */
  
  function people_connection_types() {
    p2p_register_connection_type(
      array(
        'name'  => 'show_to_actor',
        'from'  => 'show',
        'to'    => 'person',
        'title' => array( 'from' => 'Actors', 'to' => 'Shows' ),
        'from_label' => 'Cast',
        'to_label' => 'Resume',
        'sortable' => 'any',
        'fields' => array(
          'role' => array(
              'title' => 'Role',
              'type' => 'text',
          ),
          'notes' => array( 
              'title' => 'Notes',
              'type' => 'textarea',
          ),
      )
    )
  );
  p2p_register_connection_type(
      array(
        'name'  => 'show_to_creative',
        'from'  => 'show',
        'to'    => 'person',
        'title' => 'Creatives',
        'from_label' => 'Creatives',
        'to_label' => 'Resume',
        'sortable' => 'any',
        'fields' => array(
          'role' => array(
              'title' => 'Position',
              'type' => 'text',
          ),
          'notes' => array( 
              'title' => 'Notes',
              'type' => 'textarea',
          ),
      )
    ) );
}
add_action( 'p2p_init', 'people_connection_types' );


function venue_connection_types() {
    p2p_register_connection_type( array(
        'name'  => 'show_to_venue',
        'from'  => 'show',
        'to'    => 'venue',
        'sortable' => 'any',
        'fields' => array(
          'start' => array(
              'title' => 'Start Date',
              'type' => 'date',
          ),
          'end' => array(
              'title' => 'End Date',
              'type' => 'date',
          ),
      )
    ) );
}
add_action( 'p2p_init', 'venue_connection_types' );



function producer_connection_types() {
    p2p_register_connection_type( array(
        'name'  => 'show_to_producer',
        'from'  => 'show',
        'to'    => 'producer',
        'sortable' => 'any',
        'admin_dropdown' => 'true'
      ) );
}
add_action( 'p2p_init', 'producer_connection_types' );


// A FEW USEFUL FUNCTIONS

function atdb_has_connection( $from_id, $connected_type ) {
    global $post;
    $result = false;
        
    if ( null === $from_id ) return $result;

    $connected = get_posts( array(
            'connected_type' => $connected_type,
            'connected_items' => $from_id,
            'nopaging' => true,
        ) 
    );
    if ( ! empty( $connected ) ) :
        $result = true;
    endif;

    return $result;
}

add_action('save_post', 'atdb_person_is_actor', 10, 1 );

function atdb_person_is_actor($post_id) {
 $post = get_post($post_id);
  if ($post->post_type == 'person') {
    
    $actor = atdb_has_connection($post_id,'show_to_actor');
    
    if ( $actor ) { 
      update_post_meta($post_id, 'actor',true);
    } else {
      update_post_meta($post_id, 'actor',false);
    }
    
  }
}
  

add_action('save_post', 'atdb_person_is_creative', 10, 1 );

function atdb_person_is_creative($post_id) {
 $post = get_post($post_id);
  if ($post->post_type == 'person') {
    
    $creative = atdb_has_connection($post_id,'show_to_creative');
    
    if ( $creative ) { 
      update_post_meta($post_id, 'creative',true);
    } else {
      update_post_meta($post_id, 'creative',false);
    }
    
  }
}