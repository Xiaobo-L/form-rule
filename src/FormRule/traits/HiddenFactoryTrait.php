<?php
namespace FormRule\traits;

use FormRule\components\Hidden;

trait HiddenFactoryTrait
{
    /**
     * 隐藏组件
     *
     * @param string $field
     * @param mixed $value
     * @return Hidden
     */
    public static function hidden($field, $value)
    {
        return new Hidden($field, $value);
    }
}