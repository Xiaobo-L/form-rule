<?php
namespace FormRule\components;


use FormRule\rule\BaseRule;
use FormRule\rule\CallPropsRule;

class FormComponent implements \JsonSerializable
{
    use BaseRule;
    use CallPropsRule;

    protected static $propsRule = [];

    protected $defaultProps = [];

    protected $appendRule = [];

    protected $selectComponent;

    public function __construct($field, $title, $value = '')
    {
        $this->setRuleType($this->getComponentName())
            ->props($this->defaultProps)
            ->field($field)
            ->title($title)
            ->value($value);

        if (isset(static::$propsRule['placeholder']))
            $this->placeholder($this->getPlaceHolder());

    }


    public function appendRule($name, $value)
    {
        $this->appendRule[$name] = $name == 'props' ? (object)$value : $value;
        return $this;
    }

    public function appendProp($name, $value)
    {
        $this->props[$name] = $value;
        return $this;
    }


    public function getRule()
    {
        return array_merge(
            $this->getBaseRule(),
        );
    }

    public function build()
    {
        return $this->appendRule + $this->getRule();
    }

    public function jsonSerialize()
    {
        return $this->build();
    }



    protected function getPlaceHolder()
    {
        return ($this->selectComponent ? '请选择' : '请输入') . $this->title;
    }



    protected function getComponentName()
    {
        return lcfirst(basename(str_replace('\\', '/', get_class($this))));
    }
}