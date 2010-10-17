<?php 


class Tests_Zircote_Ccp_Api_Command_Corporation_MemberSecurityLog 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-09-02 18:43:51</currentTime>
  <result>
    <rowset name="roleHistory" key="changeTime" columns="changeTime,characterID,issuerID,roleLocationType">
      <row changeTime="2008-08-07 17:57:00" characterID="1234567890" characterName="Tester" issuerID="1234567890" issuerName="Tester" roleLocationType="rolesAtOther">
        <rowset name="oldRoles" key="roleID" columns="roleID,roleName">
          <row roleID="8192" roleName="roleHangarCanTake1" />
          <row roleID="1048576" roleName="roleHangarCanQuery1" />
          <row roleID="2097152" roleName="roleHangarCanQuery2" />
          <row roleID="4194304" roleName="roleHangarCanQuery3" />
          <row roleID="8388608" roleName="roleHangarCanQuery4" />
          <row roleID="16777216" roleName="roleHangarCanQuery5" />
          <row roleID="33554432" roleName="roleHangarCanQuery6" />
          <row roleID="4398046511104" roleName="roleContainerCanTake1" />
        </rowset>
        <rowset name="newRoles" key="roleID" columns="roleID,roleName" />
      </row>
      <row changeTime="2008-08-07 17:57:00" characterID="1234567890" characterName="Tester" issuerID="1234567890" issuerName="Tester" roleLocationType="rolesAtOther">
        <rowset name="oldRoles" key="roleID" columns="roleID,roleName">
          <row roleID="8192" roleName="roleHangarCanTake1" />
          <row roleID="1048576" roleName="roleHangarCanQuery1" />
          <row roleID="2097152" roleName="roleHangarCanQuery2" />
          <row roleID="4194304" roleName="roleHangarCanQuery3" />
          <row roleID="8388608" roleName="roleHangarCanQuery4" />
          <row roleID="16777216" roleName="roleHangarCanQuery5" />
          <row roleID="33554432" roleName="roleHangarCanQuery6" />
          <row roleID="4398046511104" roleName="roleContainerCanTake1" />
        </rowset>
        <rowset name="newRoles" key="roleID" columns="roleID,roleName" />
      </row>
      <row changeTime="2008-08-07 17:57:00" characterID="1234567890" characterName="Tester" issuerID="1234567890" issuerName="Tester" roleLocationType="rolesAtOther">
        <rowset name="oldRoles" key="roleID" columns="roleID,roleName">
          <row roleID="8192" roleName="roleHangarCanTake1" />
          <row roleID="1048576" roleName="roleHangarCanQuery1" />
          <row roleID="2097152" roleName="roleHangarCanQuery2" />
          <row roleID="4194304" roleName="roleHangarCanQuery3" />
          <row roleID="8388608" roleName="roleHangarCanQuery4" />
          <row roleID="16777216" roleName="roleHangarCanQuery5" />
          <row roleID="33554432" roleName="roleHangarCanQuery6" />
          <row roleID="4398046511104" roleName="roleContainerCanTake1" />
        </rowset>
        <rowset name="newRoles" key="roleID" columns="roleID,roleName" />
      </row>
      <row changeTime="2008-08-07 17:57:00" characterID="1234567890" characterName="Tester" issuerID="1234567890" issuerName="Tester" roleLocationType="rolesAtOther">
        <rowset name="oldRoles" key="roleID" columns="roleID,roleName">
          <row roleID="2199023255552" roleName="roleEquipmentConfig" />
          <row roleID="4503599627370496" roleName="roleJuniorAccountant" />
        </rowset>
        <rowset name="newRoles" key="roleID" columns="roleID,roleName" />
      </row>
    </rowset>
  </result>
  <cachedUntil>2008-09-02 19:43:51</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testMemberSecurityLog(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Corporation/MemberSecurityLog.php';
 		$api = new Zircote_Ccp_Api;
 		$out = $api->setScope('Corp')
 			->MemberSecurityLog();
// 		print_r($out->result);
 	}
}