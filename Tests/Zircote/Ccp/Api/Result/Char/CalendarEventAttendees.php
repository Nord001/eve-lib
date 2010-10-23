<?php 


class Tests_Zircote_Ccp_Api_Result_Char_CalendarEventAttendees
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
 		$this->markTestIncomplete();
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Char/CalendarEventAttendees.php';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Char')
 			->CalendarEventAttendees();
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
 		$api = $out = null;
 	}
}