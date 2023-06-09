<?php
namespace FormRule\traits;

use FormRule\components\Tree;
use FormRule\components\TreeData;

trait TreeFactoryTrait
{
    /**
     * 树形组件
     *
     * @param string $field
     * @param string $title
     * @param mixed $value
     * @param string $type
     * @return Tree
     */
    public static function tree($field, $title, $value = [], $type = Tree::TYPE_CHECKED)
    {
        $tree = new Tree($field, $title, $value);
        return $tree->type($type);
    }

    /**
     * 获取选中的值
     *
     * @param string $field
     * @param string $title
     * @param mixed $value
     * @return Tree
     */
    public static function treeSelected($field, $title, $value = [])
    {
        return self::tree($field, $title, $value, Tree::TYPE_SELECTED);
    }

    /**
     * 获取勾选的值
     *
     * @param string $field
     * @param string $title
     * @param mixed $value
     * @return Tree
     */
    public static function treeChecked($field, $title, $value = [])
    {
        return self::tree($field, $title, $value)->showCheckbox(true);
    }

    /**
     * 树形组件数据 date 类
     *
     * @param mixed $id
     * @param string $title
     * @param array $children
     * @return TreeData
     */
    public static function treeData($id, $title, array $children = [])
    {
        return new TreeData($id, $title, $children);
    }
}