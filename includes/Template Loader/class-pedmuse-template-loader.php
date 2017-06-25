<?php
/**
 * Pedamuse 
 *
 * @package   pedamuse
 * @author    Aurthur Nusendame
 * @link      http://aurthurmusendame.com/
 * @copyright 2017 Aurthur Musendame
 * @license   GPL-2.0+
 */

if ( ! class_exists( 'Gamajo_Template_Loader' ) ) {
  require plugin_dir_path( __FILE__ ) . 'class-gamajo-template-loader.php';
}

/**
 * Template loader for Pedamuse
 *
 * Only need to specify class properties here.
 *
 * @package Pedamuse
 * @author Aurthur Musendame
 */
class Pedamuse_Template_Loader extends Gamajo_Template_Loader {
  /**
   * Prefix for filter names.
   *
   * @since 1.0.0
   *
   * @var string
   */
  protected $filter_prefix = 'pedamuse';

  /**
   * Directory name where custom templates for this plugin should be found in the theme.
   *
   * @since 1.0.0
   *
   * @var string
   */
  protected $theme_template_directory = 'pedamuse';

  /**
   * Reference to the root directory path of this plugin.
   *
   * Can either be a defined constant, or a relative reference from where the subclass lives.
   *
   * In this case, `PEDAMUSE_PLUGIN_DIR` would be defined in the root plugin file as:
   *
   * ~~~
   * define( 'PEDAMUSE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
   * ~~~
   *
   * @since 1.0.0
   *
   * @var string
   */
  protected $plugin_directory = PEDAMUSE_PLUGIN_DIR;

  /**
   * Directory name where templates are found in this plugin.
   *
   * Can either be a defined constant, or a relative reference from where the subclass lives.
   *
   * e.g. 'templates' or 'includes/templates', etc.
   *
   * @since 1.1.0
   *
   * @var string
   */
  protected $plugin_template_directory = 'templates';
}





// Template loader instantiated elsewhere, such as the main plugin file.
$meal_planner_template_loader = new Meal_Planner_Template_Loader;



// Use it to call the get_template_part() method. This could be within a shortcode callback, or something you want theme developers to include in their files.

$meal_planner_template_loader->get_template_part( 'recipe' );

// If you want to pass data to the template, call the set_template_data() method with an array before calling get_template_part(). set_template_data() returns the loader object to allow for method chaining.

$data = array( 'foo' => 'bar', 'baz' => 'boom' );
$meal_planner_template_loader
    ->set_template_data( $data );
    ->get_template_part( 'recipe' );

// The value of bar is now available inside the recipe template as $data->foo.

// If you wish to use a different variable name, add a second parameter to set_template_data():

$data = array( 'foo' => 'bar', 'baz' => 'boom' );
$meal_planner_template_loader
    ->set_template_data( $data, 'context' )
    ->get_template_part( 'recipe', 'ingredients' );


// The value of bar is now available inside the recipe template as $context->foo.

// This will try to load up wp-content/themes/my-theme/meal-planner/recipe-ingredients.php, or wp-content/themes/my-theme/meal-planner/recipe.php, then fallback to wp-content/plugins/meal-planner/templates/recipe-ingredients.php or wp-content/plugins/meal-planner/templates/recipe.php

///an example short code 
<?php
 
define( 'PW_SAMPLE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
 
require PW_SAMPLE_PLUGIN_DIR . 'class-gamajo-template-loader.php';
require PW_SAMPLE_PLUGIN_DIR . 'class-pw-template-loader.php';
 
function pw_sample_shortcode() {
 
	$templates = new PW_Template_Loader;
 
	// Templates will be loaded here
 
}
add_shortcode( 'pw_sample', 'pw_sample_shortcode' );

//Now you can load template files like this:

$templates->get_template_part( $slug, $name );

//When put in our short code, it looks like this:

function pw_sample_shortcode() {
 
	$templates = new PW_Template_Loader;
 
	ob_start();
	$templates->get_template_part( 'content', 'header' );
	$templates->get_template_part( 'content', 'middle' );
	$templates->get_template_part( 'content', 'footer' );
	return ob_get_clean();
 
}
add_shortcode( 'pw_sample', 'pw_sample_shortcode' );