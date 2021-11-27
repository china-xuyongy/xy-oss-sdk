<?php


namespace xuyong\oss\Storage\aliyun;


use OSS\Core\OssException;
use OSS\OssClient;
use xuyong\oss\Storage\UploadStorage;

class Aliyun implements UploadStorage
{

    public function upload($pathName,array $config)
    {
        // 阿里云主账号AccessKey拥有所有API的访问权限，风险很高。强烈建议您创建并使用RAM账号进行API访问或日常运维，请登录RAM控制台创建RAM账号。
        $accessKeyId = $config['AppId'];
        $accessKeySecret = $config['AppKey'];
        // Endpoint以杭州为例，其它Region请按实际情况填写。
        $endpoint = $config['endpoint'];
        // 设置存储空间名称。
        $bucket= $config['bucket'];
        $extension = $config['extension']??'jpg';     // 获取文件后缀名
        // <yourObjectName>上传文件到OSS时需要指定包含文件后缀在内的完整路径，例如abc/efg/123.jpg
        $fileName = md5(time() . $pathName . rand(11111, 999999));
        //这里呢我直接把文件后缀固定了，可以根据自己的需要修改
        $object = date('Y-m-d', time()) . '/' . $fileName . ".$extension";
        //获取二进制文件流
        //$content = file_get_contents($pathName);
        try {
            $ossClient = new OssClient($accessKeyId, $accessKeySecret, $endpoint);
            //$content 文件内容，字符串上传
            //$ossClient->putObject($bucket, $object, $content);
            //文件上传 $pathName临时文件路径
            $url = $ossClient->uploadFile($bucket, $object, $pathName)['info']['url'];
            //返回给图片路径
            return  $url;
        } catch (OssException $e) {
            exit($e->getMessage());
        }
    }
}