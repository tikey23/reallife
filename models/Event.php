<?php

namespace Rl\Models;

use Rl\Models\Model;

class Event extends Model {
	protected $table = "event";
	protected $orderBy = "eventdate";

	function sendNotification(){
		$dateCreate = date_create($this->eventdate);
		$date = date_format($dateCreate, "d. F Y");
		$subjectHeader = "[RL-Einsatz] " . $date;
		$subjectShift1 = "Schicht 17:30 - 20:30Uhr";
		$subjectShift2 = "Schicht 20:30 - 23:00Uhr";

		$mailContentHeader = "Du wurdest fuer den Einsatz am <b>" . $date . "</b> eingeteilt.";
		$contentShift1 = "Deine Schicht faengt um <b>17:30Uhr</b> an und endet um <b>20:30Uhr</b>.";
		$contentShift2 = "Deine Schicht faengt um <b>20:30Uhr</b> an und endet um <b>23:00Uhr</b>.";

		if($this->leader1 != 0){
			$member = findOne(Member::class, $this->leader1);
			$address = $member->e_mail;
			$addressName = $member->membername;

			$subject = $subjectHeader;
			$mailContent = $mailContentHeader . "Leiter1";
			$report = "Die Bestätigung an <span class='font-bold'>" . $member->membername . "</span> wurde versandt.<br>";
	
			sendEmail($address, $addressName, $subject, $mailContent, $report);
	
		}

		if($this->leader2 != 0){
			$member = findOne(Member::class, $this->leader2);
			$address = $member->e_mail;
			$addressName = $member->membername;

			$subject = $subjectHeader;
			$mailContent = $mailContentHeader . "Leiter2";
			$report = "Die Bestätigung an <span class='font-bold'>" . $member->membername . "</span> wurde versandt.<br>";
	
			sendEmail($address, $addressName, $subject, $mailContent, $report);
	
		}

		if($this->helper1 != 0){
			$member = findOne(Member::class, $this->helper1);
			$address = $member->e_mail;
			$addressName = $member->membername;

			$subject = $subjectHeader . " / " . $subjectShift1;
			$mailContent = $mailContentHeader . "<br>" . $contentShift1;
			$report = "Die Bestätigung an <span class='font-bold'>" . $member->membername . "</span> wurde versandt.<br>";
	
			sendEmail($address, $addressName, $subject, $mailContent, $report);
	
		}

		if($this->helper2 != 0){
			$member = findOne(Member::class, $this->helper2);
			$address = $member->e_mail;
			$addressName = $member->membername;

			$subject = $subjectHeader . " / " . $subjectShift2;
			$mailContent = $mailContentHeader . "<br>" . $contentShift2;
			$report = "Die Bestätigung an <span class='font-bold'>" . $member->membername . "</span> wurde versandt.<br>";
	
			sendEmail($address, $addressName, $subject, $mailContent, $report);
	
		}

		if($this->helper3 != 0){
			$member = findOne(Member::class, $this->helper3);
			$address = $member->e_mail;
			$addressName = $member->membername;

			$subject = $subjectHeader . " / " . $subjectShift1;
			$mailContent = $mailContentHeader . "<br>" . $contentShift1;
			$report = "Die Bestätigung an <span class='font-bold'>" . $member->membername . "</span> wurde versandt.<br>";
	
			sendEmail($address, $addressName, $subject, $mailContent, $report);
	
		}

		if($this->helper4 != 0){
			$member = findOne(Member::class, $this->helper4);
			$address = $member->e_mail;
			$addressName = $member->membername;

			$subject = $subjectHeader . " / " . $subjectShift2;
			$mailContent = $mailContentHeader . "<br>" . $contentShift2;
			$report = "Die Bestätigung an <span class='font-bold'>" . $member->membername . "</span> wurde versandt.<br>";
	
			sendEmail($address, $addressName, $subject, $mailContent, $report);
	
		}
	}
}