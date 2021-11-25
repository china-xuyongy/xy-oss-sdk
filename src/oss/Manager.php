<?php


namespace xuyong\oss;

use xuyong\oss\Storage\aliyun\Aliyun;
use xuyong\oss\Storage\qiniu\Qiniu;
use xuyong\oss\Storage\tencent\Tencent;

class Manager
{
    public static function storage($type)
    {
        $storage = null;
        switch ($type){
            case 'aliyun':
                $storage = new Aliyun();
                break;
            case 'tencent':
                $storage = new Tencent();
                break;
            case 'qiniu':
                $storage = new Qiniu();
                break;
            default:
                $storage = null;
        }
        return $storage;
    }
}