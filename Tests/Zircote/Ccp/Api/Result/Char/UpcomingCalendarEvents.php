<?php 


class Tests_Zircote_Ccp_Api_Result_Char_UpcomingCalendarEvents
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
 <eveapi version="2">
   <currentTime>2010-09-20 13:55:44</currentTime>
   <result>
     <rowset name="upcomingEvents" key="eventID" columns="eventID,ownerID,ownerName,eventDate,eventTitle,duration,importance,response,eventText">
       <row eventID="70485" ownerID="1" ownerName="" eventDate="2010-09-25 20:00:00" 
       eventTitle="Mass Testing on Singularity" duration="120" importance="0" response="Undecided" 
       eventText="Our next mass test on the Singularity test server will be on Saturday, September 25, 2010 at 20:00 UTC ." />
     </rowset>
   </result>
   <cachedUntil>2010-09-20 14:10:44</cachedUntil>
 </eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Char/UpcomingCalendarEvents.php';
 		$out = new Zircote_Ccp_Api_Result_Char_UpcomingCalendarEvents($this->sharedFixture);
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('upcomingEvents', $out->result['result']);
		foreach (explode(',','eventID,ownerID,ownerName,eventDate,eventTitle,duration,importance,response,eventText') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['upcomingEvents']['70485']);
		}
 		$api = $out = null;
 	}
}