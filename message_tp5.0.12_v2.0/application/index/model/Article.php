<?php

namespace app\index\model;
use think\Model;

class Article extends Model
{
	protected $autoWriteTimestamp = true;
	protected $updateTime = false;
	public function comments()
	{
		return $this->hasMany("Comment");
	}
}