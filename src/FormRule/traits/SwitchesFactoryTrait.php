<?php
namespace FormRule\traits;

use FormRule\components\Switches;

trait SwitchesFactoryTrait
{
    /**
     * 开关组件
     *
     * @param string $field
     * @param string $title
     * @param mixed $value
     * @return Switches
     */
    public static function switches($field, $title, $value = '0')
    {
        return new Switches($field, $title, $value);
    }
}