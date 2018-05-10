# qiniu-oss-for-laravel
# Installation
```
$ composer require gming/qiniu-oss-for-laravel --prefer-source
```

Then add the service provider to `config/app.php`

```php
Gming\QiniuOss\QiniuOssServiceProvider::class
```

Publish the migrations file:

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
