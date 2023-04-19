<?php
namespace FormRule\traits;

use FormRule\components\Group;

trait GroupFactoryTrait
{

    /**
     * 数组组件
     *
     * @param string $field
     * @param string $title
     * @param array $value
     * @return Group
     */
    public static function group($field, $title, $value = [])
    {
        return new Group($field, $title, $value);
    }
}