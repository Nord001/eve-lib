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

class Tests_Zircote_Ccp_Api_Command_Corp_FacWarStats 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-07-10 13:13:28</currentTime>
  <result>
    <factionID>500001</factionID>
    <factionName>Caldari State</factionName>
    <enlisted>2008-06-10 22:10:00</enlisted>
    <pilots>6</pilots>
 
    <killsYesterday>0</killsYesterday>
    <killsLastWeek>0</killsLastWeek>
    <killsTotal>0</killsTotal>
    <victoryPointsYesterday>0</victoryPointsYesterday>
    <victoryPointsLastWeek>1144</victoryPointsLastWeek>
    <victoryPointsTotal>0</victoryPointsTotal>
 
  </result>
  <cachedUntil>2008-07-10 14:13:28</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testFacWarStats(){
 		$this->markTestSkipped();
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Corp/FacWarStats.php';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Corp')
 			->FacWarStats();
// 		print_r($out->result);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('factionID', $out->result['result']);
 	}
}