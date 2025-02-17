<p align="center">
    <img alt="Logo CodeIgniter3" src="/art/logo.png">
</p>

<p align="center">
    <a href="https://packagist.org/packages/iescarro/codeigniter3"><img src="https://img.shields.io/packagist/dt/iescarro/codeigniter3" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/iescarro/codeigniter3"><img src="https://img.shields.io/packagist/v/iescarro/codeigniter3" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/iescarro/codeigniter3"><img src="https://img.shields.io/packagist/l/iescarro/codeigniter3" alt="License"></a>
</p>

```
composer create-project iescarro/codeigniter3 blog
cd blog
php ignite generate:scaffold Post title:varchar content:text
cp .env.example .env
php public/index.php migrate
php ignite serve
```
