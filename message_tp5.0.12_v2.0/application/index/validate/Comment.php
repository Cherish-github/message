<?php

namespace app\index\validate;
use think\Validate;

class Comment extends Validate
{
	protected $rule = [
		'username|名字' => 'require',
		'content|评论内容' => 'require'
	];
}