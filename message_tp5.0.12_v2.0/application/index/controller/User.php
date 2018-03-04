<?php 

namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Validate;
use think\Session;
use app\index\model\User as UserModel;

class User extends Controller
{	
	//登录页面
	public function login()
	{	
		return $this->fetch('index/login');
	}

	//登录验证
	public function checkUser(Request $request)
	{	
		//获取请求数据
		$data = $request->param();
		$data['password'] = md5($data['password']);
		//调用模型验证
		$res =  UserModel::where($data)->find();
		if (is_null($res)) {
			$this->error("用户名或密码输入错误！");
		} else {
			//验证通过，开启(tp5默认开启)session保存登录信息
			Session::set('userId',$res['id']);
			Session::set('username',$res['username']);
			$this->success("登陆成功！",'/');
		}
	}

	//注销
	public function logout()
	{
		Session::clear();
		$this->success("退出成功，欢迎再次登录!",'/');
	}

	//注册页面
	public function register()
	{
		return $this->fetch('index/register');
	}

	//注册验证
	public function registerValidate(Request $request)
	{	
		//获取请求数据
		$data['username'] = $request->param("username");
		$data['password'] = $request->param("password");
		$repassword = $request->param("repassword");
		//用户名、密码是否为空
		$res = $this->validate($data,'User');
		if (true !== $res) {
			$this->error($res);
		} else {
			//验证用户名是否已被注册、密码检验
			$res = UserModel::where('username',$data['username'])->find();
			if (!is_null($res)) {
				$this->error("很抱歉！该用户名已被注册~");
			} elseif (is_null($data['password'])) {
				$this->error("请设置用户登录密码！");
			} elseif ($repassword !== $data['password']) {
				$this->error("两次输入的密码不一致！请重新输入~");
			} else {
				$data['password'] = md5($data['password']);
				$result = UserModel::create($data);
				if ($result) {
					$this->success("注册成功！赶紧登录试试吧",'/login');
				} else {
					$this->error("注册失败！");
				}
			}
		}
	}

}