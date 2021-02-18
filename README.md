# laravel seal
Basic authentication scaffolding using [Blade](https://laravel.com/docs/8.x/blade), [Bootstrap 5](https://v5.getbootstrap.com/) and [Livewire](https://laravel-livewire.com/).

## Screenshot
![login](https://i.imgur.com/lvLLOKb.png)

## Installation
```bash
composer require haq/seal --dev
php artisan seal:install
npm install && npm run dev
```

## Bootstrap Pagination
Call the paginator's useBootstrap method within your AppServiceProvider.
```php
use Illuminate\Pagination\Paginator;

public function boot()
{
    Paginator::useBootstrap();
}
```
