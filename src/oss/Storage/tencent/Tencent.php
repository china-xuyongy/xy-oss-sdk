<?php


namespace xuyong\oss\Storage\tencent;


use Qcloud\Cos\Client;
use xuyong\oss\Storage\UploadStorage;

class Tencent implements UploadStorage
{
    public function upload($pathName,array $config)
    {
        // TODO: Implement upload() method.
        // 初始化
        $cosClient = new Client(array(
            'region' => $config['endpoint'],
            'schema' => 'http',
            'credentials'=> array(
                'secretId'  => $config['AppId'],
                'secretKey' => $config['AppKey']
            )
        ));
        // 重新命名文件
        $newName = uniqid().time().strrchr($pathName, '.');
        // 上传资源
        $result = $cosClient->putObject(array(
            'Bucket' => $config['bucket'], // 你的 bucket 名称
            'Key' => $newName,
            'Body' => fopen($pathName, 'rb'),
            'ContentType' => 'image/jpg,image/png,image/jpeg,image/tmp'
        ));
        // 查看结果
        return $result;
    }
}