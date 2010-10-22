<?php 


class Tests_Zircote_Ccp_Api_Command_Char_Research
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2010-01-22 22:02:46</currentTime>
  <result>
    <rowset name="research" key="agentID" columns="agentID,skillTypeID,researchStartDate,pointsPerDay,remainderPoints">
      <row agentID="3011113" skillTypeID="11452" researchStartDate="2009-09-08 06:19:29" pointsPerDay="66.64" remainderPoints="6.293213773155" />
      <row agentID="3011154" skillTypeID="11452" researchStartDate="2009-09-02 06:49:35" pointsPerDay="65.66" remainderPoints="33.0962187499972" />
      <row agentID="3011165" skillTypeID="11452" researchStartDate="2007-10-19 22:18:37" pointsPerDay="68.48" remainderPoints="-29285.7593840278" />
      <row agentID="3011534" skillTypeID="11453" researchStartDate="2009-09-08 06:36:20" pointsPerDay="85.76" remainderPoints="31.7952812500007" />
    </rowset>
  </result>
  <cachedUntil>2010-01-22 22:17:46</cachedUntil>
</eveapi>
 
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
 		$this->markTestSkipped();
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Char/Research.php';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Char')
 			->Research();
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('research', $out->result['result']);
 		$api = $out = null;
 	}
}