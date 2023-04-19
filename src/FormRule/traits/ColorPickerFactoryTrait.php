<?php
namespace FormRule\traits;


use FormRule\components\ColorPicker;

trait ColorPickerFactoryTrait
{
    /**
     * 颜色选择组件
     *
     * @param string $field
     * @param string $title
     * @param string $value
     * @return ColorPicker
     */
    public static function color($field, $title, $value = '')
    {
        return new ColorPicker($field, $title, (string)$value);
    }
}