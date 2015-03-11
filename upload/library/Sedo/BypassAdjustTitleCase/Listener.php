<?php
class Sedo_BypassAdjustTitleCase_Listener
{
	public static function render_usergroups(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
	{
		$preparedOption['formatParams'] = XenForo_Model::create('Sedo_BypassAdjustTitleCase_Model_GetUsergroups')->getUserGroupOptions($preparedOption['option_value']);
		return XenForo_ViewAdmin_Helper_Option::renderOptionTemplateInternal('option_list_option_checkbox', $view, $fieldPrefix, $preparedOption, $canEdit);
	}

	public static function extendsDwDiscussionThread($class, array &$extend)
	{
		if($class == 'XenForo_DataWriter_Discussion_Thread')
		{
			$extend[] = 'Sedo_BypassAdjustTitleCase_DataWriter_Discussion_Thread';
		}
	}
}
//Zend_Debug::dump($abc);