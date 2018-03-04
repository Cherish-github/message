<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Validate;
use think\Request;
use think\Session;
use app\index\model\Article;
use app\index\model\Comment;
use app\index\model\User;

class Index extends Controller
{	
	//展示留言记录
    public function index(Request $request)
    {	
    	$title = $request->param('search');
    	if (is_null($title)) {
    		//每页展示6条记录
       		$list = Article::paginate(5);
    	} else {
    		$list = Article::where('title','like',"%{$title}%")->paginate(5);
    	}
    	
        //每条记录追加评论总数
        foreach ($list as $val) {
        	$res = Article::get($val['id']);
        	$val['count'] = $res->comments()->count();
        }

        //查询session
        $username = Session::get('username');

        //模板变量赋值
        $this->assign('list',$list);
        $this->assign('user',$username);
        //模板渲染
        return $this->fetch();
    }


    //查看留言
    public function read(Request $request)
    {
    	//根据相应留言id从数据库获取留言和评论
    	$article_id = $request->param('id');
    	$article = Article::get(['id'=>$article_id]);
        $article['username'] = User::get(['id'=>$article['user_id']])->username;
    	$comments = $article->comments;        
        foreach ($comments as  $com) {  
            $com['username'] = User::get(['id'=>$com['user_id']])->username;
        }

        //查询session
        $username = Session::get('username');
        $userId = Session::get('userId');

        //模板变量赋值
    	$this->assign([
    		'article'=>$article,
    		'comments'=>$comments,
            'user'=>$username,
            'userId'=>$userId
    	]);
    	//模板渲染
    	return $this->fetch();
    }

    //删除留言
    public function delete(Request $request)
    {   
        if ($request->session('username') !== 'admin') {
            $this->error("您没有权限进行删除操作！");
        } else {
        	//根据相应id从数据库删除留言和评论
        	$id = $request->param('id')?$request->param('id'):"";
        	if (is_null($id)) {
        		$this->error( "操作无效！");
        	} elseif ($res = Article::destroy($id)) {
        		$this->success('删除留言成功！','/');
        	} else {
        		$this->error('删除留言失败！');
        	}
        }
    }

    //添加留言页面
    public function add()
    {   
        $userId = Session::get("userId");
        $username = Session::get("username");
        $this->assign([
            'userId' => $userId,
            'username' => $username
            ]);
    	return $this->fetch();
    }

    //添加留言操作
    public function addMessage(Request $request)
    {	
    	//表单数据的获取、验证
    	$data = $request->param();
    	$res = $this->validate($data,'Article');
    	if (true!==$res) {
    		$this->error($res);
    	} 
    	//数据入库
    	$article = Article::create($data);
    	if ($article) {
    		$this->success('留言成功！','index/index/index');
    	} else {
    		$this->error('留言失败!');
    	}
    }

    //添加评论
    public function addComment(Request $request)
    {
    	//表单数据的获取、验证
    	$data = $request->param();
    	if (is_null($data['content'])) {
    		$this->error("评论内容不能为空！");
    	} 
    	//数据入库
    	$comment = Comment::create($data);
    	if ($comment) {
    		$this->success('评论成功！',url('index/index/read',['id'=>$data['article_id']]));
    	} else {
    		$this->getError();
    	}
    }

}
