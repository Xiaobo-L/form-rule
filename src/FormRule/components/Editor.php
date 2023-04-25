<?php

namespace FormRule\components;


/**
 * Input组件,支持类型text、password、textarea、url、email、date
 * Class Input
 *
 * // * @method $this disabled(bool $boole)
 */
class Editor extends FormComponent
{

    protected $defaultProps = [
        'config' => [
            'menus' => [
                'head',
                'bold',
                'fontSize',
                'fontName',
                'italic',
                'underline',
                'strikeThrough',
                'indent',
                'lineHeight',
                'foreColor',
                'backColor',
                'link',
                'list',
                'todo',
                'justify',
                'quote',
                'emoticon',
                'image',
                'video',
                'table',
                'code',
                'splitLine',
                'undo',
                'redo',
            ],
//            'uploadImgServer' => '',
            'uploadFileName' => 'file',
//            'showLinkImg' => false,
//            'uploadVideoServer' => '',
            'uploadVideoName' => 'file',
//            'showLinkVideo' => false
        ]
    ];


    protected static $propsRule = [
        'config' => [
//            'uploadImgServer' => 'string',
            'uploadFileName' => 'string',
//            'showLinkImg' => 'string',
//            'uploadVideoServer' => 'string',
            'uploadVideoName' => 'string',
//            'showLinkVideo' => 'string'
        ],

    ];


    /**
     * 上传图片的url
     * @param $url
     * @return $this
     */
    public function uploadImgServer($url)
    {
        $this->props['config']['uploadImgServer'] = $url;
        return $this;
    }

    /**
     * 上传视频的url
     * @param $url
     * @return $this
     */
    public function uploadVideoServer($url)
    {
        $this->props['config']['uploadVideoServer'] = $url;
        return $this;
    }

    /**
     * 动态修改config
     * @param $name
     * @param $value
     * @return $this
     */
    public function setConfig($name, $value)
    {
        $this->props['config'][$name] = $value;
        return $this;
    }

}