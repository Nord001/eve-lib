<?php 

class Tests_Zircote_Ccp_Api_Result_Eve_CharacterName 
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
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testCharacterName(){
 		require_once 'Zircote/Ccp/Api/Result/Eve/CharacterName.php';
 		$out = new Zircote_Ccp_Api_Result_Eve_CharacterName($this->sharedFixture);
		$this->assertArrayHasKey('characters', $out->result['result']);
		foreach ($out->result['result']['characters'] as $characterID => $character) {
			$this->assertArrayHasKey('name', $character);
			$this->assertArrayHasKey('characterID', $character);
			$this->assertEquals($characterID, $character['characterID']);
		}
		$out = $api = null;
 	}
}