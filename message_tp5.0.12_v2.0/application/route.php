<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

    'read/:id' => 'index/index/read',
    'delete/:id' => 'index/index/delete',
    'add' => 'index/index/add',
    'addmessage' => 'index/index/addMessage',
    'addcomment/:article_id' => 'index/index/addComment',
    'search' => 'index/index/search',
    'login' => 'index/user/login',
    'logout' => 'index/user/logout',
    'check' => 'index/user/checkUser',
    'register' => 'index/user/register',
    'register_validate' => 'index/user/registerValidate'
];
