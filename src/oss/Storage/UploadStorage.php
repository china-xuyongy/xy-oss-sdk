<?php


namespace xuyong\oss\Storage;

interface UploadStorage
{
    public function upload($pathName,array $config);
}