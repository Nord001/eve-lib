<?php 


class Tests_Zircote_Ccp_Api_Command_Char_WalletJournal
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
 		$this->markTestSkipped();
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Char/WalletJournal.php';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Char')
 			->WalletJournal();
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
 		$api = $out = null;
 	}
}