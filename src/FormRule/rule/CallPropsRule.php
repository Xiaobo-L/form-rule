<?php

namespace FormRule\rule;

use think\Exception;

trait CallPropsRule
{
    /**
     * 设置组件属性
     *
     * @param $name
     * @param $arguments
     * @return $this
     * @throws Exception
     */
    public function __call($name, $arguments)
    {

        if (isset(static::$propsRule[$name])) {
            if (!isset($arguments[0])) return isset($this->props[$name]) ? $this->props[$name] : null;
            $value = $arguments[0];
            if (is_array(static::$propsRule[$name])) {
                settype($value, static::$propsRule[$name][0]);
                $name = static::$propsRule[$name][1];
            } else if (static::$propsRule[$name]) {
                settype($value, static::$propsRule[$name]);
            }
            $this->props[$name] = $value;
            return $this;
        } else {
            throw new Exception($name . '方法不存在');
        }
    }
}