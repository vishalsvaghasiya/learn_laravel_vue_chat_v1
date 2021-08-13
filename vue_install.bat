@echo

@REM composer create-project --prefer-dist laravel/laravel:^7.0 project_name
call "composer require laravel/ui:^2.4"
call "php artisan ui vue --auth"
call "npm install && npm run dev"
@REM call npm install
@REM call npm run dev
call "npm install vue-router"
call "npm install bootstrap-vue"
call "php artisan storage:link"
@REM call "php artisan migrate"

exit();
