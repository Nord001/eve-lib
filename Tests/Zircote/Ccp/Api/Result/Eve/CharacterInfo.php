<?php 

class Tests_Zircote_Ccp_Api_Result_Eve_CharacterInfo 
	extends PHPUnit_Framework_TestCase {
		
	public function setUp(){
		$this->sharedFixture = <<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2010-10-05 19:45:21</currentTime>
  <result>
    <characterID>1643072492</characterID>
    <characterName>Catari Taga</characterName>
    <race>Caldari</race>
    <bloodline>Achura</bloodline>
    <corporationID>553239300</corporationID>
    <corporation>Centre Of Attention</corporation>
    <corporationDate>2009-02-03 13:06:00</corporationDate>
    <allianceID>1923227030</allianceID>
    <alliance>Middle of Nowhere</alliance>
    <alliancenDate>2009-02-03 13:06:00</alliancenDate>
    <securityStatus>0.0</securityStatus>
  </result>
  <cachedUntil>2010-10-05 20:41:58</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testCharacterInfo(){
 		require_once 'Zircote/Ccp/Api/Result/Eve/CharacterInfo.php';
 		$out = new Zircote_Ccp_Api_Result_Eve_CharacterInfo($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('result', $out->result);
			$this->assertArrayHasKey('characterID', $out->result['result']);
			$this->assertArrayHasKey('characterName', $out->result['result']);
			$this->assertArrayHasKey('corporationID', $out->result['result']);
			$this->assertArrayHasKey('securityStatus', $out->result['result']);
			$this->assertArrayHasKey('corporation', $out->result['result']);
 		$api = $out = null;
 	}
}