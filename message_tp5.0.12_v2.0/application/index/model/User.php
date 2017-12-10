<?php

namespace app\index\model;
use think\Model;
use think\Db;
class User extends Model
{
	protected $autoWriteTimestamp = true;

	//关联留言表
	public function articles()
	{
		return $this->hasMany("Article");
	}

	//关联评论表
	public function comments()
	{
		return $this->hasMany("Comment");
	}

	

	
}