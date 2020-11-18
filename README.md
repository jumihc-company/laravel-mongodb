## 安装配置

使用以下命令安装：
```
$ composer require jmhc/laravel-mongodb
```

## 快速使用

> 配置指定环境变量：[env](docs/ENV.md)
>
> 更多使用方式查看 [jenssegers/laravel-mongodb](https://github.com/jenssegers/laravel-mongodb/blob/master/README.md)

```php
use Jmhc\Mongodb\BaseModel;

class User extends BaseModel
{}

$users = User::all();
```
