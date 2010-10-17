<?php 

class Tests_Zircote_Ccp_Api_Command_Eve_ErrorList 
	extends PHPUnit_Framework_TestCase {
		
	public function setUp(){
		$this->sharedFixture = <<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2010-01-09 23:22:14</currentTime>
  <result>
    <rowset name="errors" key="errorCode" columns="errorCode,errorText">
      <row errorCode="100" errorText="Expected before ref/trans ID = 0: wallet not previously loaded." />
      <row errorCode="101" errorText="Wallet exhausted: retry after {0}." />
      <row errorCode="102" errorText="Expected before ref/trans ID [{0}] but supplied [{1}]: wallet previously loaded." />
      <row errorCode="103" errorText="Already returned one week of data: retry after {0}." />
      <row errorCode="105" errorText="Invalid characterID." />
      <row errorCode="106" errorText="Must provide userID parameter for authentication." />
      <row errorCode="107" errorText="Invalid beforeRefID provided." />
      <row errorCode="108" errorText="Invalid accountKey provided." />
      <row errorCode="109" errorText="Invalid accountKey: must be in the range 1000 to 1006." />
      <row errorCode="110" errorText="Invalid beforeTransID provided." />
      <row errorCode="111" errorText="'{0}' is not a valid integer." />
      <row errorCode="112" errorText="Version mismatch." />
      <row errorCode="113" errorText="Version escalation is not allowed at this time." />
      <row errorCode="114" errorText="Invalid itemID provided." />
      <row errorCode="115" errorText="Assets already downloaded: retry after {0}." />
      <row errorCode="116" errorText="Industry jobs already downloaded: retry after {0}." />
      <row errorCode="117" errorText="Market orders already downloaded: retry after {0}." />
      <row errorCode="118" errorText="Expected beforeKillID = 0: wallet not previously loaded." />
      <row errorCode="119" errorText="Kills exhausted: retry after {0}." />
      <row errorCode="120" errorText="Expected beforeKillID [{0}] but supplied [{1}]: kills previously loaded." />
      <row errorCode="121" errorText="Invalid beforeKillID provided." />
      <row errorCode="122" errorText="Invalid or missing list of names." />
      <row errorCode="123" errorText="Invalid or missing list of IDs." />
      <row errorCode="124" errorText="Character not enlisted in Factional Warfare." />
      <row errorCode="125" errorText="Corporation not enlisted in Factional Warfare." />
      <row errorCode="200" errorText="Current security level not high enough." />
      <row errorCode="201" errorText="Character does not belong to account." />
      <row errorCode="202" errorText="API key authentication failure." />
      <row errorCode="203" errorText="Authentication failure." />
      <row errorCode="204" errorText="Authentication failure." />
      <row errorCode="205" errorText="Authentication failure (final pass)." />
      <row errorCode="206" errorText="Character must have Accountant or Junior Accountant roles." />
      <row errorCode="207" errorText="Not available for NPC corporations." />
      <row errorCode="208" errorText="Character must have Accountant, Junior Accountant, or Trader roles." />
      <row errorCode="209" errorText="Character must be a Director or CEO." />
      <row errorCode="210" errorText="Authentication failure." />
      <row errorCode="211" errorText="Login denied by account status." />
      <row errorCode="212" errorText="Authentication failure (final pass)." />
      <row errorCode="213" errorText="Character must have Factory Manager role." />
      <row errorCode="214" errorText="Corporation is not part of alliance." />
      <row errorCode="501" errorText="GetID({0}) is invalid or not loaded." />
      <row errorCode="503" errorText="GetSkillpointsForLevel({0}, {1}): invalid input." />
      <row errorCode="504" errorText="GetRace({0}): invalid race." />
      <row errorCode="505" errorText="GetGender({0}): invalid gender." />
      <row errorCode="506" errorText="GetBloodline({0}): invalid bloodline." />
      <row errorCode="507" errorText="GetAttributeName({0}): invalid attribute." />
      <row errorCode="508" errorText="GetRefType({0}): invalid reftype." />
      <row errorCode="509" errorText="attributeID {0} has null data components." />
      <row errorCode="510" errorText="Character does not appear to have a corporation.  Not loaded?" />
      <row errorCode="511" errorText="AccountCanQuery({0}): invalid accountKey." />
      <row errorCode="512" errorText="Invalid charID passed to CharData.GetCharacter()." />
      <row errorCode="513" errorText="Failed to get character roles in corporation." />
      <row errorCode="514" errorText="Invalid corpID passed to CorpData.GetCorporation()." />
      <row errorCode="516" errorText="Failed getting user information." />
      <row errorCode="517" errorText="CSV header/row count mismatch." />
      <row errorCode="518" errorText="Unable to get current TQ time." />
      <row errorCode="519" errorText="Failed getting starbase detail information." />
      <row errorCode="520" errorText="Unexpected failure accessing database." />
      <row errorCode="521" errorText="Invalid username and/or password passed to UserData.LoginWebUser()." />
      <row errorCode="522" errorText="Failed getting character information." />
      <row errorCode="523" errorText="Failed getting corporation information." />
      <row errorCode="524" errorText="Failed getting faction member information." />
      <row errorCode="525" errorText="Failed getting medal information." />
      <row errorCode="526" errorText="Notifications for this character is not yet accessible." />
      <row errorCode="527" errorText="Mail for this character is not yet accessible." />
      <row errorCode="901" errorText="Web site database temporarily disabled." />
      <row errorCode="902" errorText="EVE backend database temporarily disabled." />
      <row errorCode="903" errorText="Rate limited [{0}]: please obey all cachedUntil timers." />
      <row errorCode="999" errorText="User forced test error condition." />
    </rowset>
  </result>
  <cachedUntil>2010-01-10 00:22:14</cachedUntil>
</eveapi>	
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testErrorList(){
		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Eve/ErrorList.php';
 		$api = new Zircote_Ccp_Api;
 		$out = $api->setScope('Eve')
 			->ErrorList();
// 		print_r($out->result);
 	}
}