<?php
/**
 * Foresight Constants.
 *
 * @package foresight_theme.
 */

define( 'SLUG_THEME', 'ciat_foresight_theme' );

/**
 * Gets the recaptcha secret
 */
define( 'FORESIGHT_GOOGLE_RECAPTCHA_SECRET_KEY', get_option( 'recaptcha_secret_key' ) );

/**
 * Gets the recaptcha site key
 */
define( 'FORESIGHT_GOOGLE_RECAPTCHA_SITE_KEY', get_option( 'recaptcha_site_key' ) );

/**
 * Gets the recaptcha score
 */
define( 'FORESIGHT_GOOGLE_RECAPTCHA_SCORE', get_option( 'recaptcha_score',  0.5 ) );

/**
 *  Google Analytics
 */
define( 'FORESIGHT_GOOGLE_ANALYTICS_TRACKING_ID', get_option( 'google_analytics_tracking_id', '' ) );
