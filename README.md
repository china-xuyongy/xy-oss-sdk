# xy-oss-sdk
文件上传

****
## example

```php

    use xuyong\oss\Manager;
    
    
    
    $config = [
        //为用户的 secretId，请登录访问管理控制台进行查看和管理，七牛云是AK
        'AppId'=>'', 
        //为用户的 secretKey，请登录访问管理控制台进行查看和管理，七牛云是SK
        'AppKey'=>'',
        //阿里云的云存储地址Region请按实际情况填写,七牛云没有可以为空，腾讯云为用户的 region，已创建桶归属的region可以在控制台查看
        'endpoint'=>'',
        //存储空间名称
        'bucket'=>'',
        //文件后缀名，如：jpg，gif，png等等。默认为：jpg
        'extension'=>''
    ];
    $cloud = Manager::storage('云存储厂商');    //阿里云：aliyun、腾讯云：tencent、七牛云：qiniu
    $storage = $cloud->upload('文件临时路径',$config);
    


```