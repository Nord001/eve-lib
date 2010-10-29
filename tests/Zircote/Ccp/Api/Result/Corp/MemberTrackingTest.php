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

class Zircote_Ccp_Api_Result_Corp_MemberTrackingTest 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2009-10-25 13:06:12</currentTime>
  <result>
    <rowset name="members" key="characterID" columns="characterID,name,startDateTime,baseID,base,title,logonDateTime,logoffDateTime,locationID,location,shipTypeID,shipType,roles,grantableRoles">
      <row characterID="150336922" name="corpexport" startDateTime="2007-06-13 14:39:00"
           baseID="0" base="" title="asdf" logonDateTime="2007-06-16 21:12:00"
           logoffDateTime="2007-06-16 21:36:00" locationID="60011566"
           location="Bourynes VII - Moon 2 - University of Caille School" shipTypeID="606"
           shipType="Velator" roles="0" grantableRoles="0"/>
      <row characterID="150337897" name="corpslave" startDateTime="2007-06-14 13:14:00"
           baseID="0" base="" title="" logonDateTime="2007-06-16 21:14:00"
           logoffDateTime="2007-06-16 21:35:00" locationID="60011566"
           location="Bourynes VII - Moon 2 - University of Caille School" shipTypeID="670"
           shipType="Capsule" roles="22517998271070336" grantableRoles="0"/>
    </rowset>
  </result>
  <cachedUntil>2009-10-25 19:06:12</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @group Zircote_Ccp_Api_Result_Corp
 	 */
 	public function testAllianceList(){
 		require_once 'Zircote/Ccp/Api/Result/Corp/MemberTracking.php';
 		$out = new Zircote_Ccp_Api_Result_Corp_MemberTracking($this->sharedFixture);
// 		print_r($out->result);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('members', $out->result['result']);
		foreach (explode(',','characterID,name,startDateTime,baseID,base,title,logonDateTime,'.
			'logoffDateTime,locationID,location,shipTypeID,shipType,roles,grantableRoles') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['members']['150336922']);
		}
// 		print_r($out->result);
 	}
}