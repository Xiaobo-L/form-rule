<?php
namespace FormRule\components;


/**
 * hidden组件
 * Class Hidden
 *
 */
class Hidden extends FormComponent
{
    /**
     * Hidden constructor.
     *
     * @param string $field
     * @param string $value
     */
    public function __construct($field, $value)
    {
        parent::__construct($field, '', $value);
    }

    /**
     * @return array
     */
    public function getRule()
    {
        return [
            'type' => $this->type,
            'field' => $this->field,
            'value' => $this->value
        ];
    }


}