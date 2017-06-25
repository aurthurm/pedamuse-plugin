<?php

////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////  Resources Metaboxesv /////////////
////////////////////////////////////////////////////////////////////////////////////

// Add a metabox to resource post types
add_action( 'add_meta_boxes', 'pedamuse_resource_details');
function pedamuse_resource_details(){
    Pedamuse()->admin->add_meta_box ('resource_meta',__( 'Resource Details', 'pedamuse' ), array('resource'));
}

// Add custom post fieds to resource_meta metabox
function my_custom_fields ( $fields, $post_type ) {

  $metabox = 'resource_meta';

  $fields = array(
    array( // Resource Name
      'metabox' => $metabox,
      'id' => '_resource_name',
      'label' => __( 'Resource Name', 'pedamuse' ),
      'description' => __( 'Enter Resource Name / Title', 'pedamuse' ),
      'type' => 'text',
      'default' => '',
    ),
    array( // Resource Description
        'metabox'       => $metabox,
        'id' 			=> '_resource_description',
        'label'			=> __( 'Resource Description' , 'pedamuse' ),
        'description'	=> __( 'Enter the Descriptionof your Resource here', 'pedamuse' ),
        'type'			=> 'textarea',
        'default'		=> '',
        'placeholder'	=> __( 'begin typing  ... ...', 'pedamuse' )
    ),
    array( // Resource Supported OS
        'metabox'       => $metabox,
        'id' 			=> '_resource_os',
        'label'			=> __( 'Resource Supportd OS', 'pedamuse' ),
        'description'	=> __( 'Choose the OS(es) that your Resource Supports', 'pedamuse' ),
        'type'			=> 'radio',
        'options'		=> array( 
            'all_os' => 'All OS', 
            'win_os' => 'Windows OS', 
            'ios_os' => 'Appe/Mac/IOS OS' 
        ),
        'default'		=> 'all_os'
    ),
    array( // Resource Price
        'metabox'       => $metabox,
        'id' 			=> '_resource_price',
        'label'			=> __( 'Resource Price' , 'pedamuse' ),
        'description'	=> __( 'How much does the Resource Cost? USD 120 or Variable', 'pedamuse' ),
        'type'			=> 'text',
        'default'		=> '',
        'placeholder'	=> __( '$ Variable', 'pedamuse' )
    ),
    array(
        'metabox'       => $metabox,
        'id' 			=> '_resource_url',
        'label'			=> __( 'Resource URL' , 'pedamuse' ),
        'description'	=> __( 'What is the url / web adress that links to your resource', 'pedamuse' ),
        'type'			=> 'text',
        'default'		=> '',
        'placeholder'	=> __( '//www.go.there', 'pedamuse' )
    ),
      
      
  );

  return $fields;
}

// Add the function to the filter
// add_filter( 'resource_custom_fields', array( $this, 'my_custom_fields' ), 10, 2 ); // not working
add_filter( 'resource_custom_fields', 'my_custom_fields', 10, 2 );

////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////  Social Navigation Metaboxes  /////////////
////////////////////////////////////////////////////////////////////////////////////

// Add a metabox to social_nav post types
add_action( 'add_meta_boxes', 'pedamuse_social_nav');
function pedamuse_social_nav(){
    Pedamuse()->admin->add_meta_box ('social_navigation_meta',__( 'Social Navigation Links', 'pedamuse' ), array('social_nav'));
}


// Add custom post fieds to social_navigation_meta metabox
add_filter( 'social_nav_custom_fields', 'social_custom_fields');
function social_custom_fields ( $fields, $post_type ) {

  $metabox1 = 'social_navigation_meta';

  $fields = array(

    array( 
        'metabox'       => $metabox1,
        'id'            => 'social_select_name',
        'label'         => __( 'Social Netwrok', 'pedamuse' ),
        'description'   => __( 'Seclect your Social Network', 'pedamuse'),
        'type'          => 'select',
        'options'       => array( 
            'facebook'  => 'Facebook', 
            'twitter'   => 'Twitter', 
            'linkedin'  => 'LinkedIn', 
            'instagram' => 'Instagram', 
            'pinterest' => 'Pinterest', 
            'googleplus' => 'Google Plus'
            ),
        'default'       => 'facebook'
    ),

    array(
        'metabox'       => $metabox1,
        'id'            => 'social_link',
        'label'         => __( 'Social URL/ Link' , 'pedamuse' ),
        'description'   => __( 'What is the url / web adress that links to your social profile', 'pedamuse' ),
        'type'          => 'url',
        'default'       => '',
        'placeholder'   => __( '//www.fb.com/foo', 'pedamuse' )
    ),
  
  );

  return $fields;
}


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////  Service or Work Metaboxes    /////////////
////////////////////////////////////////////////////////////////////////////////////

// Add a metabox to work_service post types
add_action( 'add_meta_boxes', 'pedamuse_service');
function pedamuse_service(){
    Pedamuse()->admin->add_meta_box ('service_meta',__( 'Services on Offer', 'pedamuse' ), array('work_service'));
}


// Add custom post fieds to social_navigation_meta metabox
add_filter( 'work_service_custom_fields', 'service_custom_fields');
function service_custom_fields ( $fields, $post_type ) {

  $metabox2 = 'service_meta';

  $fields = array(
    array( // Service Name
      'metabox' => $metabox2,
      'id' => 'service_name',
      'label' => __( 'Service Name', 'pedamuse' ),
      'description' => __( 'Enter Service Title', 'pedamuse' ),
      'type' => 'text',
      'default' => '',
      'placeholder'   => __( 'Web Developer', 'pedamuse' )
    ),

    array( // Service Description
        'metabox'       => $metabox2,
        'id'            => 'service_description',
        'label'         => __( 'Service Description' , 'pedamuse' ),
        'description'   => __( 'Enter the Descriptionof the Service here', 'pedamuse' ),
        'type'          => 'textarea',
        'default'       => '',
        'placeholder'   => __( 'begin typing  ... ...', 'pedamuse' )
    ),

    array(
        'metabox'       => $metabox2,
        'id'            => 'service_link',
        'label'         => __( 'Service URL/ Link' , 'pedamuse' ),
        'description'   => __( 'What is the url / web adress that links to your service(s) Page', 'pedamuse' ),
        'type'          => 'url',
        'default'       => '',
        'placeholder'   => __( '//www.service.com/foo', 'pedamuse' )
    ),
  
  );

  return $fields;
}


////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////// Featured Product  on static home //////////
////////////////////////////////////////////////////////////////////////////////////

// Add a metabox to featured_product post types
add_action( 'add_meta_boxes', 'pedamuse_home_product');
function pedamuse_home_product(){
    Pedamuse()->admin->add_meta_box ('featured_product_meta',__( 'Services on Offer', 'pedamuse' ), array('featured_product'));
}

// Add custom post fieds to featured_product_meta metabox
add_filter( 'featured_product_custom_fields', 'home_product_custom_fields');
function home_product_custom_fields ( $fields, $post_type ) {

  $metabox3 = 'featured_product_meta';

  $fields = array(
    array( // Product Name
      'metabox' => $metabox3,
      'id' => 'product_name',
      'label' => __( 'Product Name', 'pedamuse' ),
      'description' => __( 'Enter Product Title', 'pedamuse' ),
      'type' => 'text',
      'default' => '',
      'placeholder'   => __( 'Simplicity Love', 'pedamuse' )
    ),

    array( // Product Lead
      'metabox' => $metabox3,
      'id' => 'product_lead',
      'label' => __( 'Product Subtitle', 'pedamuse' ),
      'description' => __( 'Enter Product Sub-Title', 'pedamuse' ),
      'type' => 'text',
      'default' => '',
      'placeholder'   => __( 'Building a better stronger you', 'pedamuse' )
    ),

    array( // Product Description
        'metabox'       => $metabox3,
        'id'            => 'product_description',
        'label'         => __( 'Product Description' , 'pedamuse' ),
        'description'   => __( 'Enter the Descript ionof the Product here', 'pedamuse' ),
        'type'          => 'textarea',
        'default'       => '',
        'placeholder'   => __( 'begin typing  ... ...', 'pedamuse' )
    ),

    array(
        'metabox'       => $metabox3,
        'id'            => 'product_link',
        'label'         => __( 'Product URL/ Link' , 'pedamuse' ),
        'description'   => __( 'What is the url / web adress that links to your Product', 'pedamuse' ),
        'type'          => 'url',
        'default'       => '',
        'placeholder'   => __( '//www.service.com/foo', 'pedamuse' )
    ),
    array( // Product Name
      'metabox' => $metabox3,
      'id' => 'product_link_text',
      'label' => __( 'Product Link Text', 'pedamuse' ),
      'description' => __( 'Enter Product Link text', 'pedamuse' ),
      'type' => 'text',
      'default' => 'Grab your copy now!',
      'placeholder'   => __( 'Grab your copy now', 'pedamuse' )
    ),
  
  );

  return $fields;
}
