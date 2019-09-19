<?php

namespace app\api\validate;

use think\Validate;

class Account extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'username' => 'require|min:4|max:16|alphaDash',
        'password' => 'require|min:6|max:16|alphaDash',
        'repassword'=>'require|confirm:password',
        'phone' => 'require|number|length:11',
        'code' => 'require|length:4',
        'uuid' => 'require'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'username.require' => '请输入账号',
        'username.min' => '账号4-16位英文和数字',
        'username.max' => '账号4-16位英文和数字',
        'username.alphaDash' => '账号4-16位英文和数字',

        'password.require' => '请输入密码',
        'password.min' => '密码6-16位英文和数字',
        'password.max' => '密码6-16位英文和数字',
        'password.alphaDash' => '密码6-16位英文和数字',

        'repassword.require' => '请输入确认密码',
        'repassword.confirm' => '两次密码不一致',

        'phone.require' => '请输入手机号',
        'phone.number' => '手机号格式有误',
        'phone.length' => '手机号格式有误',

        'code.require' => '请输入验证码',
        'code.length' => '验证码有误',
        'uuid.require' => '请输入uuid'
    ];
}
