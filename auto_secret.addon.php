<?php
if(!defined('__XE__'))
	exit();

/**
 * @file auto_secret.addon.php
 * @author 퍼니엑스이 (contact@funnyxe.com)
 * @brief 자동 비밀글 설정
 */
if($called_position == 'before_module_proc')
{
	$act = Context::get('act');
	if($act == 'procBoardInsertDocument')
	{
		Context::set('is_secret', 'Y', TRUE);
		Context::set('status', 'SECRET', TRUE);
	}
}

if($called_position == 'after_module_proc')
{
	$act = Context::get('act');
	// 글쓰기 페이지인 경우
	if($act == 'dispBoardWrite')
	{
		$oDocument = Context::get('oDocument');

		if(is_object($oDocument))
		{
			// 비밀글 사용에 체크합니다
			$oDocument->add('is_secret', 'Y');
			$oDocument->add('status', 'SECRET');
		}
	}
}

/* End of file auto_secret.addon.php */
/* Location: ./addons/auto_secret */
