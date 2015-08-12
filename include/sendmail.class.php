<?php

class sendmail{

	var $charset="UTF-8";

	var $contentType = "html";

	var $attachments=array();

	function sendmail(){}

	

	function send($to, $from, $subject, $content){

		if(is_array($to)){

			foreach($to as $val){

				$rs=$this->send($val, $from, $subject, $content);

			}

			return $rs;

		}

		$headers  = 'MIME-Version: 1.0' . "\r\n";

		

		// Additional headers

		// $headers .= "To: {$to}" . "\r\n";

		$headers .= "From: {$from} \r\n";

		

		$s_contentType = $this->contentType=="html"?"text/html":"text/plain";

		

		if(empty($this->attachments)){

			$s_contentType = $this->contentType=="html"?"text/html":"text/plain";

			$headers .= "Content-type: {$s_contentType}; charset={$this->charset}" . "\r\n";

		} else {

		

			$this->addStringAsAttachment($content, "", $s_contentType.";charset={$this->charset}");

			

			$headers.=$this->build_multipart();

			

			$content="";

		

		}

		

		//echo "$headers"; exit;

		

		return $this->_sys_mail($to, $subject, $content, $headers);

	}

	/**

	 *  \r,\n^V

	 */

	function filter_nl($string){

		return str_replace(array( chr(12), chr(15) ), ' ', $string);

	}

	

	

	function is_mail($string){

		$string = strtolower($string);

		$pattern = "^([a-z0-9]*[-_\.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?$";

		return ereg($pattern, $string)?true:false;

	}

	

	function _sys_mail ( $to, $subject, $message, $additional_headers=NULL, $additional_parameters=NULL ){

		return mail($to, $subject, $message, $additional_headers, $additional_parameters);

	}


	function addStringAsAttachment($message, $name = "", $ctype = 'application/octet-stream') {

		$this->attachments[]=array(

			"message" => $message,

			"name" => $name,

			"ctype" => $ctype

		);

	}

	

	// (multipart)

	function build_message($part) {

		$message = $part["message"];

		$message = chunk_split(base64_encode($message));

		$encoding = "base64";

		return "Content-Type: ".$part["ctype"].($part["name"]? "; name = \"".$part["name"]."\"" : "")."\nContent-Transfer-Encoding: $encoding\n\n$message\n";

	}



	function build_multipart() {

		$boundary = "b".md5(uniqid(time()));

		$multipart = "Content-Type: multipart/mixed; boundary = $boundary\n\nThis is a MIME encoded message.\n\n--$boundary";

		for($i = sizeof($this->attachments)-1; $i>=0; $i--) $multipart .= "\n".$this->build_message($this->attachments[$i]). "--$boundary";

		return $multipart.=  "--\n";

	}

}