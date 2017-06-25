<?php
// Add a metabox to page  types
add_action( 'add_meta_boxes', 'pedamuse_page_info');
function pedamuse_page_info(){
    Pedamuse()->admin->add_meta_box ('pedamuse_page_meta',__( 'Header Page Info', 'pedamuse' ), array('page'));
}

// Add custom post fieds to pedamuse_page_meta
add_filter( 'page_custom_fields', 'pedamuse_page_custom_fields', 10, 2 );
function pedamuse_page_custom_fields ( $fields, $post_type ) {

  $metabox = 'pedamuse_page_meta';

  $fields = array(
    array( // Resource Description
        'metabox' => $metabox,
        'id' 			=> 'page_header_description',
        'label'			=> __( 'Page Description' , 'pedamuse' ),
        'description'	=> __( 'Enter the Short Description of your Page Header here. It will appear at the top of this page ust under the page title ', 'pedamuse' ),
        'type'			=> 'textarea',
        'default'		=> '',
        'placeholder'	=> __( 'begin typing  ... ...', 'pedamuse' )
    ),
      
      
  );

  return $fields;
}