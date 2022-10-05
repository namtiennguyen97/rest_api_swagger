<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:


## L5-Swagger

Step 1: Install swagger via composer:  
> composer require "darkaonline/l5-swagger"  

or you can also remove swagger by this command line:  
> composer remove "darkaonline/l5-swagger"  

Step 2: Publish your config swagger file  
> php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"

Step 3: Go to .env laravel file. add this line below to allow Swagger always generate:  
> L5_SWAGGER_GENERATE_ALWAYS=true  
Or if not, just run command line: php artisan l5-swagger:generate.
  
Note: 👀 You can change swagger ui PATH by go to config laravel file, find l5-swagger.php and change config.  
If you want to see demo your first swagger ui, then add this line first into your base Controller  
 > /* *  
 > * @OA\Info(title="Demo swagger", version="any")  
 > * /  
 
 Step 4: Run command line:  
 > php artisan l5-swagger:generate

-NamNguyen
