<?php

namespace FormRule\traits;


use FormRule\components\Editor;

trait EditorFactoryTrait
{
    public static function editor($field, $title, $value = '')
    {
        $input = new Editor($field, $title, (string)$value);
        return $input;
    }

}