<?php

namespace app\api\tool;

/**
 * 验证合集
 * Class RuleAll
 * @package app\api\tool
 */
class RuleAll
{

    /**
     * 注册验证合集
     */
    public function initRegister()
    {
        return config('rule.regular');
    }
}