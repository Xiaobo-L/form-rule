<?php
namespace FormRule\components;


/**
 * Class TreeData
 *
 * @method $this id(string $id) Id, 必须唯一
 * @method $this title(string $title) 标题
 * @method $this expand(bool $bool) 是否展开直子节点, 默认为false
 * @method $this disabled(bool $bool) 禁掉响应, 默认为false
 * @method $this disableCheckbox(bool $bool) 禁掉 checkbox
 * @method $this selected(bool $bool) 是否选中子节点
 * @method $this checked(bool $bool) 是否勾选(如果勾选，子节点也会全部勾选)
 */
class TreeData extends FormComponent
{
    /**
     * @var array
     */
    protected $children = [];

    /**
     * @var array
     */
    protected $props = [];

    /**
     * @var array
     */
    protected static $propsRule = [
        'id' => 'string',
        'title' => 'string',
        'expand' => 'bool',
        'disabled' => 'bool',
        'disableCheckbox' => 'bool',
        'selected' => 'bool',
        'checked' => 'bool',
    ];

    /**
     * @param array $children
     * @return $this
     */
    public function children(array $children)
    {
        $this->children = array_merge($this->children, $children);
        return $this;
    }

    /**
     * @param TreeData $child
     * @return $this
     */
    public function child(TreeData $child)
    {
        $this->children[] = $child;
        return $this;
    }

    /**
     * @return array
     */
    public function getOption()
    {
        $children = [];
        foreach ($this->children as $child) {
            $children[] = $child instanceof TreeData
                ? $child->getOption()
                : $child;
        }
        $this->props['children'] = $children;
        return $this->props;
    }

}