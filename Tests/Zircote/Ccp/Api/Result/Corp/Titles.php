<?php 


class Tests_Zircote_Ccp_Api_Result_Corp_Titles 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-09-02 17:38:02</currentTime>
  <result>
    <rowset name="titles" key="titleID" columns="titleID,titleName">
      <row titleID="1" titleName="Member">
        <rowset name="roles" key="roleID" columns="roleID,roleName,roleDescription" />
        <rowset name="grantableRoles" key="roleID" columns="roleID,roleName,roleDescription" />
        <rowset name="rolesAtHQ" key="roleID" columns="roleID,roleName,roleDescription">
          <row roleID="8192" roleName="roleHangarCanTake1" roleDescription="Can take items from this divisions hangar" />
        </rowset>
        <rowset name="grantableRolesAtHQ" key="roleID" columns="roleID,roleName,roleDescription" />
        <rowset name="rolesAtBase" key="roleID" columns="roleID,roleName,roleDescription" />
        <rowset name="grantableRolesAtBase" key="roleID" columns="roleID,roleName,roleDescription" />
        <rowset name="rolesAtOther" key="roleID" columns="roleID,roleName,roleDescription" />
        <rowset name="grantableRolesAtOther" key="roleID" columns="roleID,roleName,roleDescription" />
      </row>
      <row titleID="2" titleName="unused 1">
        <rowset name="roles" key="roleID" columns="roleID,roleName,roleDescription" />
        <rowset name="grantableRoles" key="roleID" columns="roleID,roleName,roleDescription" />
        <rowset name="rolesAtHQ" key="roleID" columns="roleID,roleName,roleDescription" />
        <rowset name="grantableRolesAtHQ" key="roleID" columns="roleID,roleName,roleDescription" />
        <rowset name="rolesAtBase" key="roleID" columns="roleID,roleName,roleDescription" />
        <rowset name="grantableRolesAtBase" key="roleID" columns="roleID,roleName,roleDescription" />
        <rowset name="rolesAtOther" key="roleID" columns="roleID,roleName,roleDescription" />
        <rowset name="grantableRolesAtOther" key="roleID" columns="roleID,roleName,roleDescription" />
      </row>
    </rowset>
  </result>
  <cachedUntil>2008-09-02 18:38:02</cachedUntil>
</eveapi>

EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testTitles(){
 		require_once 'Zircote/Ccp/Api/Result/Corp/Titles.php';
 		$out = new Zircote_Ccp_Api_Result_Corp_Titles($this->sharedFixture);
// 		print_r($out->result);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('titles', $out->result['result']);
		foreach (explode(',','titleID,titleName') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['titles']['1']);
			$this->assertArrayHasKey($row, $out->result['result']['titles']['2']);
		}
		foreach (explode(',','roleID,roleName,roleDescription') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['titles']['1']['rolesAtHQ']['8192']);
		}
// 		print_r($out->result);
 	}
}