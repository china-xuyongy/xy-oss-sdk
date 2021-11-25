<?php


namespace xuyong\oss\Storage\aliyun;


use OSS\Core\OssException;
use OSS\OssClient;
use xuyong\oss\Storage\UploadStorage;

class Aliyun implements UploadStorage
{
    public function upload($pathName)
    {
        // TODO: Implement upload() method.
        // 阿里云主账号AccessKey拥有所有API的访问权限，风险很高。强烈建议您创建并使用RAM账号进行API访问或日常运维，请登录 https://ram.console.aliyun.com 创建RAM账号。
        $accessKeyId = "<yourAccessKeyId>";
        $accessKeySecret = "<yourAccessKeySecret>";
        // Endpoint以杭州为例，其它Region请按实际情况填写。
        $endpoint = "http://oss-cn-hangzhou.aliyuncs.com";
        // 存储空间名称
        $bucket= " <yourBucketName>";
        // <yourObjectName>上传文件到OSS时需要指定包含文件后缀在内的完整路径，例如abc/efg/123.jpg
        $object = " <yourObjectName>";
        $content = "Hi, OSS.";

        try {
            $ossClient = new OssClient($accessKeyId, $accessKeySecret, $endpoint);
            $ossClient->putObject($bucket, $object, $content);
        } catch (OssException $e) {
            print $e->getMessage();
        }
    }
}