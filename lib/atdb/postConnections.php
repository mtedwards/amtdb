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