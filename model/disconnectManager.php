<?php

class Disconnect{
	
	function disconnected(){
		$_SESSION = array();
		session_destroy();
	}
}
?>