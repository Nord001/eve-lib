<?php 
/**
 * @license Copyright 2010 Robert Allen
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 * http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

class EveLib_Ccp_Api_Result_Char_CalendarEventAttendeesTest
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
		
EOF;
	}
 	
 	/**
 	 * @group disable
 	 */
 	public function testCalendarEventAttendees(){
 		$this->markTestSkipped('There is currently no documentation for this api'.
 			' call as of yet it is scheduled for TQ1.2 Patch');
 		require_once 'EveLib/Ccp/Api.php';
 		require_once 'EveLib/Ccp/Api/Result/Char/CalendarEventAttendees.php';
 		$api = new EveLib_Ccp_Api(AllTests::$config);
 		$out = $api->setScope('Char')
 			->CalendarEventAttendees();
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
 		$api = $out = null;
 	}
}