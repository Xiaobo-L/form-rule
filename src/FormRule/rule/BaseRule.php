<?php
/**
 * 基础规则
 */

namespace FormRule\rule;


trait BaseRule
{
    protected $type;
    protected $title;
    protected $field;
    protected $value;
    protected $col;
    protected $options;
    protected $props = [];


    protected function setRuleType($type)
    {
        $this->type = (string)$type;
        return $this;
    }

    protected function title($title)
    {
        $this->title = (string)$title;
        return $this;
    }

    protected function field($field)
    {
        $this->field = (string)$field;
        return $this;
    }


    public function value($value)
    {
        if (is_null($value)) $value = '';
        $this->value = $value;
        return $this;
    }

    public function col($col,int $offset = 0)
    {
        if (is_integer($col)) $col = ['span' => $col];
        $this->col = $col;
        return $this;
    }

    public function options(array $options)
    {
        $this->options = $options;
        return $this;
    }


    public function props(array $props)
    {
        $this->props = array_merge($this->props, $props);
        return $this;
    }


    protected function getBaseRule()
    {
        $rule = [
            'type' => $this->type
        ];
        if (!is_null($this->field))
            $rule['field'] = $this->field;
        if (!is_null($this->value))
            $rule['value'] = $this->value;
        if (!is_null($this->title))
            $rule['title'] = $this->title;
        if (!is_null($this->col))
            $rule['col'] = $this->col;
        if (!is_null($this->options))
            $rule['options'] = $this->options;
        if (!is_null($this->props))
            $rule['props'] = $this->props;
        return $rule;
    }
}