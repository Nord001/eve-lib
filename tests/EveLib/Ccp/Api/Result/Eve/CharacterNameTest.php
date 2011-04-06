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
class EveLib_Ccp_Api_Result_Eve_CharacterNameTest 
	extends PHPUnit_Framework_TestCase {
		
	public function setUp(){
		$this->sharedFixture = <<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2009-10-18 17:05:31</currentTime>
  <result>
    <rowset name="characters" key="characterID" columns="name,characterID">
      <row name="CCP Garthagk" characterID="797400947" /> 
    </rowset>
  </result>
  <cachedUntil>2009-11-18 17:05:31</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @group EveLib_Ccp_Api_Result_Eve
 	 */
 	public function testCharacterName(){
 		//include_once 'EveLib/Ccp/Api/Result/Eve/CharacterName.php';
 		$out = new EveLib_Ccp_Api_Result_Eve_CharacterName($this->sharedFixture);
		$this->assertArrayHasKey('characters', $out->result['result']);
		foreach ($out->result['result']['characters'] as $characterID => $character) {
			$this->assertArrayHasKey('name', $character);
			$this->assertArrayHasKey('characterID', $character);
			$this->assertEquals($characterID, $character['characterID']);
		}
		$out = $api = null;
 	}
}