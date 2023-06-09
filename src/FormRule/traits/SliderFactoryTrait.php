<?php
namespace FormRule\traits;


use FormRule\components\Slider;

trait SliderFactoryTrait
{
    /**
     * 滑块组件
     *
     * @param string $field
     * @param string $title
     * @param int|array $value
     * @return Slider
     */
    public static function slider($field, $title, $value = 0)
    {
        $slider = new Slider($field, $title, $value);
        if (is_array($value)) $slider->range(true);
        return $slider;
    }

    /**
     * 区间选择
     *
     * @param string $field
     * @param string $title
     * @param int $start
     * @param int $end
     * @return Slider
     */
    public static function sliderRange($field, $title, $start = 0, $end = 0)
    {
        $slider = self::slider($field, $title, [(int)$start, (int)$end]);
        $slider->range(true);
        return $slider;
    }
}