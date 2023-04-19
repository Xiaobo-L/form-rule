<?php
namespace FormRule\traits;


use FormRule\components\Select;

trait SelectFactoryTrait
{
    /**
     * 下拉选择组件
     *
     * @param string $field
     * @param string $title
     * @param mixed $value
     * @return Select
     */
    public static function select($field, $title, $value = '')
    {
        $multiple = is_array($value) ? true : false;
        $select = new Select($field, $title, $value);
        $select->multiple($multiple);
        return $select;
    }

    /**
     * 多选
     *
     * @param string $field
     * @param string $title
     * @param array $value
     * @return Select
     */
    public static function selectMultiple($field, $title, array $value = [])
    {
        return self::select($field, $title, $value);
    }
}