<?php
/**
 * Created by PhpStorm.
 * User: helloworld
 * Date: 2018/5/9
 * Time: 下午4:17
 */
namespace Gming\QiniuOss\Traits;

use GuzzleHttp\Client;
use InvalidArgumentException;

trait QiniuOss{

    /**
     * @param string $fileUri file path + file name
     * @param integer $maxFileSize the file max size, Units:Byte ,default 1GB
     * @param integer $ttl the file validity period, default: 3600s
     * @param string $customParam
     * @return array|mixed
     */
    public  function uploadCertificate($fileUri, $maxFileSize, $ttl = 3600, $customParam = '')
    {

        if (!($url = config('qiniu-oss.apiUrls.certificate'))){
            throw new InvalidArgumentException("the apiUrls.certificate is not set. Please set your config .");
        }
        if (!($clientId = config('qiniu-oss.clientId'))){
            throw new InvalidArgumentException("the clientId is not set. Please set your config.");
        }
        $http = new Client();
        $params = [
            'key' => $fileUri,
            'limit' => $maxFileSize,
            'deadline' => $ttl,
        ];
        if ($customParam){
            $params['customParam'] = $customParam;
        }
        $headers = [
                    'ClientId' => $clientId,
                    'Content-Type' => 'application/json',
                ];
        try {
            $response = $http->post($url,[
                'json'    => $params,
                'headers' => $headers,
            ]);
            return \GuzzleHttp\json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return ['code' => $e->getCode(), 'message' => var_export($e->getMessage(), true)];
        }
    }

    /**
     * @param string $fileUri file path + file name
     * @param string $fileName
     * @return array|mixed
     */
    public  function fileInfo($fileUri, $fileName = '')
    {
        $http = new Client();
        if (!($url = config('qiniu-oss.apiUrls.fileInfo'))){
            throw new InvalidArgumentException("the apiUrls.fileInfo is not set. Please set your config.");
        }
        if (!($clientId = config('qiniu-oss.clientId'))){
            throw new InvalidArgumentException("the clientId is not set. Please set your config.");
        }
        $header = [
            'ClientId' => $clientId
        ];
        $url .= "?key=".$fileUri;
        if ($fileName) $url .=  "&fileName=".$fileName;
        try {
            $response = $http->get($url,[
                'headers' => $header
            ]);
            return \GuzzleHttp\json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return ['code' => $e->getCode(), 'message' => $e->getMessage()];
        }
    }

    /**
     * @return array|mixed
     */
    public function fileBaseUrl()
    {
        $http = new Client();
        if (!($url = config('qiniu-oss.apiUrls.fileBaseUrl'))){
            throw new InvalidArgumentException("the apiUrls.fileBaseUrl is not set. Please set your config.");
        }
        if (!($clientId = config('qiniu-oss.clientId'))){
            throw new InvalidArgumentException("the clientId is not set. Please set your config.");
        }
        $header = [
            'ClientId' => $clientId,
            'Content-Type' => 'application/json'
        ];

        try {
            $response = $http->get($url,[
                'headers' => $header
            ]);
            return \GuzzleHttp\json_decode($response->getBody());
        } catch (\Exception $e) {
            return ['code' => $e->getCode(), 'message' => $e->getMessage()];
        }
    }
}
