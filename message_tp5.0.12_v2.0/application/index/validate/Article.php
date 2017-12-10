<?php

namespace app\index\validate;
use think\Validate;

class Article extends Validate
{
	protected $rule = [
		'title|标题' => 'require',
		'content|内容' => 'require'
	];
}
