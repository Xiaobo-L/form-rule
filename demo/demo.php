<?php


use FormRule\Form;

require '../vendor/autoload.php';


$f = array();
$f[] = Form::input('nickname', '')->col(4)->placeholder('名称');
$f[] = Form::input('nickname', '姓名')->appendRule('validate', [[
    'type' => 'string',
    'required' => true,
    'message' => '请输入名称'
]]);
$f[] = Form::password('password', '密码')->appendRule('validate', [[
    'type' => 'string',
    'required' => true,
    'pattern' => '[a-zA-Z0-9_-]{4,16}',
    'message' => '用户名正则，4到16位（字母，数字，下划线，减号）'
]]);
$f[] = Form::uploadImage('avatar', '头像', '控制器');

$f[] = Form::editor('fff', '测速', '1')->uploadImgServer('111')->uploadVideoServer('1111')->setConfig('aaa', '22');
$from = Form::elm_get_form($f);

