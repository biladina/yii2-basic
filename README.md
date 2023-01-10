<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Aplikasi App - Nama Institusi (Powered by Yii2)</h1>
    <br>
</p>

Aplikasi ini dibuat untuk {ganti sendiri}.

## DIRECTORY STRUCTURE

      assets/             contains assets definition
      config/             contains application configurations
      console/            contains console commands (controllers)
      controllers/        contains Web controller classes
      environments/       contains environment-based overrides
      helpers/            contains useful helper classes
      mail/               contains view files for e-mails
      migrations/         contains all migration files
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      themes/             contains application view layout template
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources

## REQUIREMENTS

The minimum requirement by this project that your Web server supports PHP 8.1.


## WHAT CHANGE?

1. Add useful extension/module
    - [yii2-admin](https://github.com/mdmsoft/yii2-admin)
    - [almost all kartik-v extension](https://demos.krajee.com)
    - [yii2-adminlte3](https://github.com/hail812/yii2-adminlte3)
    - [yii2-ajaxcrud-bs4](https://github.com/biladina/yii2-ajaxcrud-bs4)
    - [yii2-curl](https://github.com/linslin/Yii2-Curl)
    - [phpspreadsheet](https://github.com/PHPOffice/PhpSpreadsheet)
    - [yii2-tinymce](https://github.com/alexantr/yii2-tinymce)
    - [yii2-captcha-extended](https://github.com/lubosdz/yii2-captcha-extended)
    - [var-dumper](https://github.com/symfony/var-dumper)
    - [jwt](https://github.com/bizley/yii2-jwt)


2. Separated project state, whether you choose for development or production state

3. API template ready to use


## CONFIGURATION

### Database

Ope file `config/components.php`, and change `dbname`, `username` and `password`, for example:

```php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'schemaMap' => [
                'mysql' => SamIT\Yii2\MariaDb\Schema::class
            ],
            'dsn' => 'mysql:host=localhost;dbname=db_name',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
    ]
];
```

## INSTALLATION

Install neccesary package :

```
composer install
```

Initiate project state, choose project state you want to use, `0` for development, and `1` for production :

```
php init
```

Run migration for RBAC :

```
php yii migrate --migrationPath=@yii/rbac/migrations
```

Run migration for RBAC Management :

```
php yii migrate --migrationPath=@mdm/admin/migrations
```

Run migration for the rest of application :

```
php yii migrate
```

Run this to add admin user, change `username` and `password` with you like :

```
php yii config/tambah-admin username password
```

You can then access the application through the following URL :

```
http://localhost/yii2-basic
```

Generate API key if you want to use it :

```
php yii config/generate-api-key 'config/api-local.php'
```

You can then access API endpoint through the following URL :

```
http://localhost/yii2-basic/api/v1
```