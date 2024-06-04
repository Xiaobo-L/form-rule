<?php

namespace FormRule\components;




/**
 * 数组组件
 *
 * Class Group
 * @method $this min(int $min) 最少几项
 * @method $this max(int $max) 最多几项
 * @method $this disabled(bool $bool) 是否禁用
 */
class Group extends FormComponent
{
    protected $defaultValue = [];

    protected static $propsRule = [
        'min' => 'int',
        'max' => 'int',
        'disabled' => 'int',
    ];

    /**
     * @param array|FormComponent $rule
     * @return $this
     */
    public function rule($rule)
    {
        $this->props['rule'] = $this->tidyRule([$rule])[0];
        return $this;
    }

    /**
     * @param array $rules
     * @return array
     */
    protected function tidyRule(array $rules)
    {
        foreach ($rules as $k => $rule) {
                $rules[$k] = $rule->build();
        }
        return $rules;
    }

    public function rules(array $rules)
    {
        $this->props['rules'] = $this->tidyRule($rules);
        return $this;
    }


}