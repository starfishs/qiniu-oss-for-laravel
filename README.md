# qiniu-oss-for-laravel
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2FIanGely%2Fqiniu-oss-for-laravel.svg?type=shield)](https://app.fossa.io/projects/git%2Bgithub.com%2FIanGely%2Fqiniu-oss-for-laravel?ref=badge_shield)

# Installation
```
$ composer require gming/qiniu-oss-for-laravel --prefer-source
```

Then add the service provider to `config/app.php`

```php
Gming\QiniuOss\QiniuOssServiceProvider::class
```

Publish the config file:

```sh
$ php artisan vendor:publish --provider='Gming\QiniuOss\QiniuOssServiceProvider' 
```

Finally, add feature trait into class:

```php
use Gming\QiniuOss\Traits\QiniuOss;

class Example extends ExampleParent
{
    use QiniuOss;
}
```

All available APIs are listed below.

### QiniuOss

#### `\Gming\QiniuOss\Traits\QiniuOss`

```php
$this->uploadCertificate($fileUrl, $maxFileSize, $ttl = 3600, $customParam = '')
$this->fileInfo($fileUri, $fileName = '')
$this->fileBaseUrl()
```


## License
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2FIanGely%2Fqiniu-oss-for-laravel.svg?type=large)](https://app.fossa.io/projects/git%2Bgithub.com%2FIanGely%2Fqiniu-oss-for-laravel?ref=badge_large)