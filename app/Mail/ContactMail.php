<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Contact;
use Config;

class ContactMail extends Mailable
{
	use Queueable, SerializesModels;

	public $contactEmail;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(Contact $contactEmail)
	{
		$this->contactEmail = $contactEmail;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
			return $this
			->from(env('MAIL_USERNAME'), Config::get('webname'))
		//	->name(Config::get('webname'))
			->subject('Liên hệ tại '.Config::get('webname'))->view('mails.contact');

	}
}
