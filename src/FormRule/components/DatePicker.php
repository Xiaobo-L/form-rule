<?php

namespace FormRule\components;

class DatePicker extends FormComponent
{
    /**
     * 日期选择
     */
    const TYPE_DATE = 'date';

    const TYPE_DATES = 'dates';

    const TYPE_WEEK = 'week';

    /**
     * 日期区间选择
     */
    const TYPE_DATE_RANGE = 'daterange';

    const TYPE_MONTH_RANGE = 'monthrange';

    /**
     * 日期+时间选择
     */
    const TYPE_DATE_TIME = 'datetime';
    /**
     * 日期+时间区间选择
     */
    const TYPE_DATE_TIME_RANGE = 'datetimerange';
    /**
     * 年份选择
     */
    const TYPE_YEAR = 'year';
    /**
     * 月份选择
     */
    const TYPE_MONTH = 'month';


    protected $selectComponent = true;

    protected $defaultProps = [
        'type' => self::TYPE_DATE,
        'editable' => false
    ];

    protected static $propsRule = [
        'readonly' => 'bool',
        'disabled' => 'bool',
        'editable' => 'bool',
        'clearable' => 'bool',
        'size' => 'string',
        'placeholder' => 'string',
        'startPlaceholder' => 'string',
        'endPlaceholder' => 'string',
        'timeArrowControl' => 'bool',
        'type' => 'string',
        'format' => 'string',
        'align' => 'string',
        'popperClass' => 'string',
        'pickerOptions' => 'array',
        'rangeSeparator' => 'string',
        'defaultValue' => 'string',
        'defaultTime' => 'array',
        'valueFormat' => 'string',
        'name' => 'string',
        'unlinkPanels' => 'bool',
        'prefixIcon' => 'string',
        'clearIcon' => 'string',
        'validateEvent' => 'bool',
    ];

    protected function isRange()
    {
        return in_array(strtolower($this->props['type']), ['datetimerange', 'daterange', 'monthrange']);
    }

    protected function isMultiple()
    {
        return isset($this->props['type']) && strtolower($this->props['type']) == 'dates';
    }




}