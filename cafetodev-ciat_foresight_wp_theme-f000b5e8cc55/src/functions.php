<?php
/**
 * Ciat Foresight functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ciat_foresight_theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	$theme_version = wp_get_theme()->get( 'Version' );
	define( '_S_VERSION', $theme_version );
}

/**
 * Gets the global variables to work on the theme.
 */
require get_template_directory() . '/theme/inc/constants.php';

if ( ! function_exists( 'ciat_foresight_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ciat_foresight_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ciat foresight, use a find and replace
		 * to change SLUG_THEME to the name of your theme in all the template files.
		 */
		load_theme_textdomain( SLUG_THEME, get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'foresight-main-menu' => esc_html__( 'Main Menu', SLUG_THEME ),
				'ciat-foresight-social-menu' => esc_html__( 'Social Menu', SLUG_THEME ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'ciat_foresight_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'ciat_foresight_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ciat_foresight_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ciat_foresight_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'ciat_foresight_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ciat_foresight_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', SLUG_THEME ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', SLUG_THEME ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ciat_foresight_theme_widgets_init' );

// Define path and URL to the ACF plugin.
define( 'ACF_PATH', get_stylesheet_directory() . '/theme/inc/advanced-custom-fields/' );
define( 'ACF_URL', get_stylesheet_directory_uri() . '/theme/inc/advanced-custom-fields/' );

// Include the ACF plugin.
include_once( ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter( 'acf/settings/url', 'acf_settings_url' );
function acf_settings_url( $url ) {
	return ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
add_filter( 'acf/settings/show_admin', 'acf_settings_show_admin' );
function acf_settings_show_admin( $show_admin ) {
	return false;
}

/**
 * Register google analytics in website.
 */
function foresight_google_analytics() {
	if (FORESIGHT_GOOGLE_ANALYTICS_TRACKING_ID) {
		?>
		<!-- Global Google Analytics [functions.php] -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo FORESIGHT_GOOGLE_ANALYTICS_TRACKING_ID; ?>"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments)};
			gtag('js', new Date());
			gtag('config', '<?php echo FORESIGHT_GOOGLE_ANALYTICS_TRACKING_ID; ?>');
		</script>
		<?php
	}
}

add_action('wp_head', 'foresight_google_analytics', 20);

/**
 * Enqueue scripts and styles.
 */
function ciat_foresight_theme_scripts() {

	//Styles
	wp_enqueue_style( 'ciat_foresight_theme-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_style( 'ciat_foresight_theme-bootstrap-style', get_template_directory_uri() . '/static/lib/css/bootstrap.min.css' );

	wp_enqueue_style( 'ciat_foresight_theme-fontawesome-style', get_template_directory_uri() . '/static/lib/css/all.css' );

	wp_enqueue_style('ciat_foresight_theme-slick-style', get_template_directory_uri() . '/static/lib/slick/slick.css');

	wp_enqueue_style('ciat_foresight_theme-slick-theme-style', get_template_directory_uri() . '/static/lib/slick/slick-theme.css');

	//JS
	wp_enqueue_script( 'ciat_foresight_theme-general-js', get_template_directory_uri() . '/static/js/main.min.js', array( 'jquery' ), _S_VERSION, true );
	
	wp_enqueue_script( 'ciat_foresight_theme-bootstrap-js', get_template_directory_uri() . '/static/lib/js/bootstrap.min.js', array('jquery'), 'latest', true );
	
	wp_enqueue_script( 'ciat_foresight_theme-slick-js', get_template_directory_uri() . '/static/lib/slick/slick.min.js', array(), 'latest', true );
	


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script('googleRecaptcha', 'https://www.google.com/recaptcha/api.js?render=' . FORESIGHT_GOOGLE_RECAPTCHA_SITE_KEY, 'latest', true);
	wp_localize_script('ciat_foresight_theme-general-js', 'googleRecaptcha', array( 'siteKey' => FORESIGHT_GOOGLE_RECAPTCHA_SITE_KEY ));
	wp_localize_script('ciat_foresight_theme-general-js', 'ajax_object', array( 'ajax_url' => admin_url('admin-ajax.php') ));

	//Montserrat.
	wp_register_style('fonts_montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap');

	wp_enqueue_style('fonts_montserrat');
}
add_action( 'wp_enqueue_scripts', 'ciat_foresight_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/theme/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/theme/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/theme/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/theme/inc/customizer/customizer.php';

/**
 * Load Social Navigation.
 */
require get_template_directory() . '/theme/menu/social-menu.php';

/**
 * Load Main Menu Navigation.
 */
require get_template_directory() . '/theme/menu/main-menu.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/theme/inc/jetpack.php';
}

/**
 * Register the post types that will be used in the project.
 */
foreach (glob(dirname(__FILE__). '/theme/post-types/*.php') as $filename) {
	require $filename;
}

/**
 * Loads the theme settings page.
 */
require  get_template_directory() . '/theme/inc/class/class-settings-page.php';

/**
 * Email class
 */
require  get_template_directory() . '/theme/inc/class/class-contact-us.php';
new ContactUs();

new PageSettings();
