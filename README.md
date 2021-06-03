# Chat App Laravel With VueJs

## installation :
after install the source code open Terminal to use these command line:
- composer install.
- cp .env.example .env.
- create new database in .env file.
- php artisan key:generate in .env file.
- php artisan migrate --seed.
- npm install.
- npm run dev or (npm run watch) or (npm run hot).
- php artisan serve Or use your custom domain.
### pusher required dev mode installation
- go to https://pusher.com then create new Channels. 
- after that should be got ( Pusher ID - Pusher KEY - Pusher SECRET - Pusher CLUSTER ) and paste in .env file.
- in .env file change BROADCAST_DRIVER value to (pusher).
- in config/app.php uncomment (App\Providers\BroadcastServiceProvider::class).
- in terminal add (composer require pusher/pusher-php-server).
- in terminal add (npm install --save laravel-echo pusher-js).
- in resources/js/bootstrap.js uncomment (imposer Echo from...) (window.Pusher=require...) (window.Echo=new...).
- in webpack.mix.js file add this line after (const mix...) this line (require('dotenv').config();).

## Permission folder ( Linux | Mac)
- sudo chmod -R 777 storage bootstrap/cache

## You need help? Contact me
<a href='https://alijumaan.com' target="_blank">https://alijumaan.com</a>

* enjoy...

