<?php

namespace FormRule;

use FormRule\traits\CascaderFactoryTrait;
use FormRule\traits\CheckBoxFactoryTrait;
use FormRule\traits\ColorPickerFactoryTrait;
use FormRule\traits\DatePickerFactoryTrait;
use FormRule\traits\EditorFactoryTrait;
use FormRule\traits\FrameFactoryTrait;
use FormRule\traits\GroupFactoryTrait;
use FormRule\traits\HiddenFactoryTrait;
use FormRule\traits\InputFactoryTrait;
use FormRule\traits\InputNumberFactoryTrait;
use FormRule\traits\RadioFactoryTrait;
use FormRule\traits\RateFactoryTrait;
use FormRule\traits\SelectFactoryTrait;
use FormRule\traits\SliderFactoryTrait;
use FormRule\traits\SwitchesFactoryTrait;
use FormRule\traits\TimePickerFactoryTrait;
use FormRule\traits\TreeFactoryTrait;
use FormRule\traits\UploadFactoryTrait;
use FormRule\traits\ValidateFactoryTrait;


abstract class Form
{

    use CascaderFactoryTrait;
    use CheckBoxFactoryTrait;
    use ColorPickerFactoryTrait;
    use DatePickerFactoryTrait;
    use FrameFactoryTrait;
    use HiddenFactoryTrait;
    use InputNumberFactoryTrait;
    use InputFactoryTrait;
    use RadioFactoryTrait;
    use RateFactoryTrait;
    use SliderFactoryTrait;
    use SelectFactoryTrait;

    use SwitchesFactoryTrait;
    use TimePickerFactoryTrait;
    use TreeFactoryTrait;
    use UploadFactoryTrait;
    use ValidateFactoryTrait;
    use GroupFactoryTrait;

    use EditorFactoryTrait;

    public static function elm_get_form(array $field, $title = '', $url = '', $jscallback = 2, $submitBtn = true)
    {
        $form = [
            'field' => $field
        ];
        return $form;
    }

}