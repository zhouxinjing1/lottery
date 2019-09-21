<?php

namespace app\api\model;

use think\Model;

/**
 * 系统配置
 * Class System
 * @package app\api\model
 */
class System extends Model
{
    protected $table = 'system';

     /**
     * @param $k
     * @return mixed|null
     */
    public static function getStaticValue($k)
    {
        $data = self::queryStaticKey($k);

        return $data !== array() ? $data[0] : null;
    }

    /**
     * 获取配置值
     * @param $k
     * @return |null
     */
    public function getKeyValue($k)
    {
        $data = $this->queryKey($k);

        return $data !== array() ? $data[0] : null;
    }

    /**
     * 设置配置值
     * @param $k
     * @param string $v
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function setKeyValue($k, $v = '')
    {
        $data = $this->queryKey($k);
        if ($data !== array()) {
            $this->where(array('k' => $k))->update(array('v' => $v));
        } else {
            $this->insert(array('k' => $k, 'v' => $v));
        }
    }


    /**
     * 查询是否存在
     * @param $k
     * @return array
     */
    private function queryKey($k)
    {
        return $this->where(array('k' => $k))->column('v');
    }

    /**
     * 查询是否存在
     * @param $k
     * @return array
     */
    private static function queryStaticKey($k)
    {
        return self::where(array('k' => $k))->column('v');
    }
}