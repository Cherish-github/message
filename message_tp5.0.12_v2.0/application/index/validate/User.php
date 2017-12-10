<?php

namespace app\index\validate;
use think\Validate;

class User extends Validate
{
	protected $rule = [
		'username|名字' => 'require',
		'password|密码' => 'require'
	];
}