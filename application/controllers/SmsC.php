<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SmsC extends CI_Controller
{
	public function __construct(){
		parent::__construct();
	}

	public function sendSms()
	{

		$this->load->library('twilio');
		$sms_sender = '+12562853071'; //trim($this->input->post('sms_sender'));
//		var_dump($this->input->post('sms_recipient'));die();
		$sms_reciever = $this->input->post('sms_recipient');
		$sms_message = trim($this->input->post('sms_message'));
		$from = '+' . $sms_sender; //trial account twilio number
		$to = '+' . $sms_reciever; //sms recipient number
		$response = $this->twilio->sms($from, $to, $sms_message);

		if ($response->IsError) {

			echo 'Sms Has been Not sent';
		} else {

			echo 'Sms Has been sent';;
		}
	}
}
