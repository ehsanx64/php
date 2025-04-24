<?php
class CellphoneInteractionController extends Controller {

    public function __construct() {
    }

    public function index() {
		$this->dispatchRequest();
		$testNumber = '+989379300000';
		$testMessage = 'Hello there man';

		printf("<p><a href=\"cellphone-interaction&action=call&number=%s\">Call %s</a></p>",
			$testNumber, $testNumber
		);

		printf("<p><a href=\"cellphone-interaction&action=sms&number=%s&text=%s\">SMS %s</a></p>",
			$testNumber, $testMessage, $testNumber
		);

	}

	/**
	 * Lookup the request parameters and act accordingly
	 */
	public function dispatchRequest() {
		$get = $_GET;

		// Only following actions are valid
		$validActions = [
			'call', 'sms'
		];

		p('Current _GET super global content');
		d($get);

		// Exit the method if some required parameters are missing or are empty
		if (!isset($get['action']) || empty($get['action'])) {
			// Lets argue about it
			p('Action parameter not found or empty');
			return;
		}

		$action = $get['action'];

		if (!in_array($action, $validActions)) {
			p('Invalid action requested (' . $action . ')');
			return;
		}

		// Handle the requested action
		$this->handleAction($action);

	}

	private function handleAction($action) {
		$get = $_GET;

		switch ($action) {
		case 'call':
			$this->sendHeader('tel:' . $get['number']);
			break;
		case 'sms':
			$this->sendHeader('sms:' . $get['number'] . '&body=' . $get['text']);
			break;
		default:
			break;
		}
	}

	private function sendHeader($str) {
		header('Location: ' . $str);
	}
}