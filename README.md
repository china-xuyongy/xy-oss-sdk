# xy-oss-sdk
文件上传

****
## example

```php

    use xuyong\oss\Manager;

    $cloud = Manager::storage('云存储厂商');    //阿里云：aliyun、腾讯云：tencent、七牛云：qiniu
    $storage = $cloud->upload('文件临时路径','初始化配置');
    $config = [
        //阿里云是AccessKey，七牛云是AK
        'AppId'=>'', 
        //阿里云AccessKey Secret，七牛云是SK
        'AppKey'=>'',
        //阿里云的云存储地址Region请按实际情况填写,七牛云没有可以为空
        'endpoint'=>'',
        //存储空间名称
        'bucket'=>'',
    ];


```