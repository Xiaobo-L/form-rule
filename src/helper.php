<?php

use think\facade\Request;


if (!function_exists('request_more')) {
    /**
     * 获取 请求参数
     * @param $params [[['username', 's'], '']]  or list($username)
     * @param $request request()
     * @param $suffix false or true
     * @return array
     */
    function request_more($params, $request = null, $suffix = false)
    {
        if ($request === null) $request = Request::instance();
        $p = [];
        $i = 0;
        foreach ($params as $param) {
            if (!is_array($param)) {
                $p[$suffix == true ? $i++ : $param] = $request->param($param);
            } else {
                if (!isset($param[1])) $param[1] = null;
                if (!isset($param[2])) $param[2] = '';
                if (is_array($param[0])) {
                    $name = is_array($param[1]) ? $param[0][0] . '/a' : $param[0][0] . '/' . $param[0][1];
                    $keyName = $param[0][0];
                } else {
                    $name = is_array($param[1]) ? $param[0] . '/a' : $param[0];
                    $keyName = $param[0];
                }
                $p[$suffix == true ? $i++ : ($param[3] ?? $keyName)] = $request->param($name, $param[1], $param[2]);
            }
        }
        return $p;
    }
}


if (!function_exists('json_success')) {
    /**
     * 返回成功数据
     * @param $data
     * @param $msg
     * @param $code
     * @return \think\response\Json
     */
    function json_success($data = [], $msg = '操作成功', $code = 200)
    {
        if (true == is_array($msg)) {
            $data = $msg;
            $msg = 'ok';
        }
        return json(compact('code', 'msg', 'data'));
    }
}


if (!function_exists('json_fail')) {
    /**
     * 返回失败数据
     * @param $msg
     * @param $data
     * @param $code
     * @return \think\response\Json
     */
    function json_fail($msg = '操作错误', $data = [], $code = 400)
    {
        if (true == is_array($msg)) {
            $data = $msg;
            $msg = 'no';
        }
        return json(compact('code', 'msg', 'data'));
    }

}


if (!function_exists('json_success_table')) {
    /**
     * 返回列表页数据
     * @param $count
     * @param $data
     * @param $reqdata
     * @param $msg
     * @return \think\response\Json
     */
    function json_success_table($count = 0, $data = [], $reqdata = [], $msg = ''): \think\response\Json
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
        return json(compact('code', 'msg', 'data', 'reqdata', 'count'));
    }
}


if (!function_exists('tree_merge')) {
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
    function tree_merge(array $arrTree, $pid = 0, $idField = 'id', $pidField = 'pid', $child = 'children'): array
    {
        $list = array();
        foreach ($arrTree as $v) {
            if ($v[$pidField] == $pid) {
                $childary = tree_merge($arrTree, $v[$idField], $idField, $pidField, $child);
                if ($childary) {
                    $v[$child] = $childary;
                }

                $list[] = $v;
            }
        }
        return $list;
    }
}


if (!function_exists('pdo_log')) {
    /**
     * 数据库异常写日志
     * @param think\db\exception\PDOException $e
     * @return void
     */
    function pdo_log(\think\db\exception\PDOException $e): void
    {
        $root_path = root_path();
        $fileName = 'pdo_log';
        $filePath = $root_path . '/runtime/uslog';
        $fileName = $filePath . '/' . $fileName . '-' . date('Y-m-d', time()) . '.log';

        $txt = $e->getMessage() . PHP_EOL . $e->getTraceAsString() . PHP_EOL;

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
}

if (!function_exists('ary_to_options')) {
    /**
     *  数组转换成对应格式
     * [
     *   '正常' => 1,
     *   '禁止' => 2,
     *   ];
     * @param $ary
     * @return array
     */
    function ary_to_options($ary): array
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
}

