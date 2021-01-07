<?php
define('FORESIGHT_URL_PREFIX', 'foresight/v1');


/**
 * Class ContactUs.
 * This class creates a new endPoint for contact us submission form.
 *
 * @author Cafeto Software.
 */
class ContactUs {
	public function __construct() {
		$this->init();
	}

	/**
	 * Initialize the Wordpress REST API endpoint for contact us submission
	 */
	public function init() {
		add_action('rest_api_init', function () {
			register_rest_route(FORESIGHT_URL_PREFIX, '/foresight_contact_us', array(
				'methods'  => WP_REST_Server::CREATABLE,
				'callback' => array( $this, 'validate_contact_us_form' ),
				'permission_callback' => '__return_true'
			));
		});
	}

	/**
	* register info from form contact us
	*/
	public function validate_contact_us_form() {
		$token         = $_POST[ 'token' ];
		$action        = $_POST[ 'action' ];
		$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . FORESIGHT_GOOGLE_RECAPTCHA_SECRET_KEY . '&response=' . $token;
		$response      = wp_remote_get($recaptcha_url);
		$arrResponse   = json_decode(wp_remote_retrieve_body($response));
		// verify the response
		if ($arrResponse->success && $arrResponse->action === $action && $arrResponse->score >= FORESIGHT_GOOGLE_RECAPTCHA_SCORE) {
			$this->lets_talk_email($_POST);
			$contact_page_url = $_POST['contact_location'] . "?success_email=true";
			wp_redirect(home_url()."?success_email=true&#contact-us-section");
			exit();
		} else {
			$response = array(
				'code'    => 404,
				'status'  => 'Not found',
				'message' => 'Could not create the post',
			);
			return new WP_REST_Response($response, $response[ 'code' ]);
		}
	}

	/**
	 * This function is responsible for sending an email.
	 *
	 * @return WP_REST_Response.
	 */
	public function lets_talk_email($response_form) {
		ob_start();
		$context['contact_info'] = $response_form;
		$context['subject'] = "[Foresight Contact] ";

		Timber::render('./view/email/foresight_email.twig', $context);
		$message   = ob_get_clean();

		$email_user = customize_theme_mod('foresight_contact_to_email');

		$copy_to = explode("\n", customize_theme_mod('foresight-contact-company-email'));
		$headers[] = 'Content-Type: text/html; charset=UTF-8';

		foreach ($copy_to as $email) {
			$headers[] = 'Bcc: ' . $email;
        }
		$subject = $context['subject'];

		if (wp_mail($email_user, $subject, $message, $headers)) {
			$response = array(
					'code'    => 200,
					'status'  => 'Success',
					'message' => 'Success Sent!',
				);
		} else {
			$response = array(
					'code'    => 404,
					'status'  => 'Not found',
					'message' => 'There was an error!'
				);
		}
		$response = array(
				'code'    => 404,
				'status'  => 'Not found',
				'message' => "The ID of the post to be consulted doesn't exist.",
			);
		return new WP_REST_Response($response, $response[ 'code' ]);
	}
}
