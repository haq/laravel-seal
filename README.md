<p align="center">
<img src="https://banners.beyondco.de/Laravel%20Seal.png?theme=dark&packageName=haq%2Fseal&pattern=ticTacToe&style=style_1&description=This+is+why+it%27s+awesome&md=1&showWatermark=0&fontSize=200px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg" width="500">
</p>

# laravel seal
Basic authentication scaffolding using Blade, [Bootstrap 5](https://v5.getbootstrap.com/) and [Livewire](https://laravel-livewire.com/).

## Screenshot
![login](https://i.imgur.com/APsKWlU.jpg)

## Installation
```
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
