##Ep-2.0 (under development)
Ep is a mini social network buit with [Laravel](http://laravel.com), allowing students to interact with their professors and graduates through what we call "channels", each channel contains its proper posts and members

###Configuration

- clone this repo `https://github.com/OTSAAN/Ep-2.0.git`
- run `composer install` to resolve project dependencies.
- create a MySQL database called `ep`.


### Migrations

 - `php artisan migrate --seed`
 - `php artisan migrate --package=fenos/notifynder`
 - `php artisan migrate --package=cmgmyr/messenger`