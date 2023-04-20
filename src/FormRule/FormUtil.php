<?php
namespace FormRule;

class FormUtil
{

    /**
     * 写日志
     * @param $txt
     * @param $fileName
     * @return void
     */
    public static function logs($txt = '', $fileName = '')
    {
        $root_path = root_path();
        $filePath = $root_path . '/runtime/uslog';
        $fileName = $filePath . '/' . $fileName . '-' . date('Y-m-d', time()) . '.log';

        if (!file_exists($filePath)) {
            mkdir($filePath, 0777, true);//创建目录
        }

        if (file_exists($fileName)) {
            $myfile = fopen($fileName, "a") or die("Unable to open file!");
            $txt = "\n【" . date('Y-m-d H:i:s', time()) . "】\n\n" . $txt . "\n\n";
            fwrite($myfile, $txt);
            fclose($myfile);
        } else {
            $myfile = fopen($fileName, "w") or die("Unable to open file!");
            $txt = "【" . date('Y-m-d H:i:s', time()) . "】\n\n" . $txt . "\n\n";
            fwrite($myfile, $txt);
            fclose($myfile);
        }
    }

    /**
     * 数组元素是否都在另一个数组里
     * @param $arr
     * @param $allArr
     * @return bool|void
     */
    public static function isAllExists($arr, $allArr)
    {
        if (!empty($arr) && !empty($allArr)) {
            for ($i = 0; $i < count($arr); $i++) {
                if (!in_array($arr[$i], $allArr)) {
                    return false;
                }
            }
            return true;
        }
    }

    /**
     * get请求
     * @param $url
     * @param $data
     * @param int $timeout
     * @return bool|string
     */
    public static function doCurlGetRequest($url, $data, $timeout = 5)
    {
        if ($url == "" || $timeout <= 0) {
            return false;
        }
        $url = $url . '?' . http_build_query($data);
        $con = curl_init((string)$url);
        curl_setopt($con, CURLOPT_HEADER, false);
        curl_setopt($con, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($con, CURLOPT_TIMEOUT, (int)$timeout);
        $data = curl_exec($con);
        curl_close($con);
        return $data;
    }


    /**
     * post请求
     * @param $url
     * @param $post_data
     * @param array $header
     * @return bool|string
     */
    public static function doCurlPostRequest($url, $post_data, array $header = [])
    {
        $ch = curl_init();
        $post_string = json_encode($post_data);
        $header1[] = 'content-type: application/json';
        if ($header) {
            $header1 = array_merge($header1, $header);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }


    /**
     * 返回成功数据
     * @param $data
     * @param $msg
     * @param $code
     * @return array
     */
    public static function jsonSuccess($data = [], $msg = '操作成功', $code = 200)
    {
        if (true == is_array($msg)) {
            $data = $msg;
            $msg = 'ok';
        }
        return compact('code', 'msg', 'data');
    }

    /**
     * 返回失败数据
     * @param $msg
     * @param $data
     * @param $code
     * @return array
     */
    public static function jsonFail($msg = '操作错误', $data = [], $code = 400)
    {
        if (true == is_array($msg)) {
            $data = $msg;
            $msg = 'no';
        }
        return compact('code', 'msg', 'data');
    }


    /**
     * 返回列表页数据
     * @param $count
     * @param $data
     * @param $reqdata
     * @param $msg
     * @return array
     */
    public static function jsonReqSuccesslayui($count = 0, $data = [], $reqdata = [], $msg = '')
    {
        if (is_array($count)) {
            if (isset($count['data'])) $data = $count['data'];
            if (isset($count['reqdata'])) $reqdata = $count['reqdata'];
            if (isset($count['count'])) $count = $count['count'];
        }
        if (false == is_string($msg)) {
            $data = $msg;
            $msg = 'ok';
        }
        $code = 200;
        return compact('code', 'msg', 'data', 'reqdata', 'count');
    }


    /**
     * 数据转 select 下拉框
     * @return void
     */
    public static function getOptionsAry($ary)
    {
        $reqdata = [];
        foreach ($ary as $k => $v) {
            $reqdata[] = [
                'label' => strval($k),
                'value' => strval($v)
            ];
        }
        return $reqdata;
    }


    /**
     * 递归整理树状结构
     * @param array $arrTree
     * @param int $pid
     * @param string $idField
     * @param string $pidField
     * @param string $child
     * @param int $level
     * @return array
     */
    public static function treeMerge(array $arrTree, $pid = 0, $idField = 'id', $pidField = 'pid', $child = 'children')
    {
        $list = array();
        foreach ($arrTree as $v) {
            if ($v[$pidField] == $pid) {
                $childary = self::treeMerge($arrTree, $v[$idField], $idField, $pidField, $child);
                if ($childary) {
                    $v[$child] = $childary;
                }

                $list[] = $v;
            }
        }
        return $list;
    }
}