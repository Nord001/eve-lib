<?php 


class Tests_Zircote_Ccp_Api_Command_Corporation_AccountBalance 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2007-06-18 22:40:16</currentTime>
  <result>
    <rowset name="accounts" key="accountID" columns="accountID,accountKey,balance">
      <row accountID="4759" accountKey="1000" balance="74171957.08"/>
      <row accountID="5687" accountKey="1001" balance="6.05"/>
      <row accountID="5688" accountKey="1002" balance="0.00"/>
      <row accountID="5689" accountKey="1003" balance="17349111.00"/>
      <row accountID="5690" accountKey="1004" balance="0.00"/>
      <row accountID="5691" accountKey="1005" balance="0.00"/>
      <row accountID="5692" accountKey="1006" balance="0.00"/>
    </rowset>
  </result>
  <cachedUntil>2007-06-18 22:40:26</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountBalance(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Corporation/AccountBalance.php';
 		$api = new Zircote_Ccp_Api;
 		$out = $api->setScope('Corp')
 			->AccountBalance();
// 		print_r($out->result);
 	}
}