<?php
class Sedo_BypassAdjustTitleCase_DataWriter_Discussion_Thread extends XFCP_Sedo_BypassAdjustTitleCase_DataWriter_Discussion_Thread
{
	protected function _getDefaultOptions()
	{
		$parent = parent::_getDefaultOptions();
		$bypassUsergroups =  XenForo_Application::get('options')->get('sedo_adjust_title_case_usergroups');

		if(!$parent[self::OPTION_ADJUST_TITLE_CASE] || empty($bypassUsergroups))
		{
			return $parent;
		}

		$visitor = XenForo_Visitor::getInstance();
		$visitorUserGroupIds = array_merge(array((string)$visitor['user_group_id']), (explode(',', $visitor['secondary_group_ids'])));
		
		if(array_intersect($visitorUserGroupIds, $bypassUsergroups))
		{
			$parent[self::OPTION_ADJUST_TITLE_CASE] = false;
		}
	
		return $parent;
	}
}