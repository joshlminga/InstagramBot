<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authorize extends CI_Controller
{

	/**
	 *
	 * The main controller for Administrator Backend
	 * -> The controller require user to login as Administrator
	 */

	private $Instagram_App_ID = '509859997876667';
	private $Instagram_App_Secret = 'ada75e24f7dea2d3ce57274cbd90c88e';

	/** Functions
	 * -> __construct () = Load the most required operations E.g Class Module
	 * 
	 */
	public function __construct()
	{
		parent::__construct();

		//Libraries

		//Helpers

		//Models

		// Your own constructor code
	}

	/**
	 *
	 * Auth Response
	 */
	public function auth()
	{

		// Replace with your Instagram client ID and client secret
		$client_id = $this->Instagram_App_ID;
		$client_secret = $this->Instagram_App_Secret;

		// Replace with the Instagram username of the page whose followers you want to follow
		$page_username = 'joshlminga'; //$_GET['account_username'];

		// Endpoint for getting an access token
		$token_url = 'https://api.instagram.com/oauth/access_token';

		// Set up the data for the access token request
		$token_data = [
			'client_id' => $client_id,
			'client_secret' => $client_secret,
			'grant_type' => 'client_credentials',
		];

		// Use cURL to send a POST request to the access token endpoint
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $token_url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($token_data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);


		// Decode the response to get the access token
		$response_data = json_decode($response, true);

		echo '<pre>';
		print_r($response);
		echo '<br /> ----------------------- </br>';
		print_r($response_data);
		echo '</pre>';
		die;

		//$access_token = $response_data['access_token'];
	}

	/**
	 *
	 * De-Authorize Response
	 */
	public function de_auth()
	{
	}

	/**
	 *
	 * Delete Response
	 */
	public function remove()
	{
	}
}

/** End of file Authorize.php */
/** Location: ./application/controllers/Authorize.php */
