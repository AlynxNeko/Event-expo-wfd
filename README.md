# Event-expo-wfd
 yeah tugas wfd


## Commands that helps
for wfd

# Commands
composer install
composer create-project laravel/laravel example-app
php artisan key:generate
npm install
npm install tinymce
npm run build
npm run dev 
php artisan make:model <namatabel> --migration --seed
// resolving many to many
php artisan make:model <namatabelpivot> --migration --seed --pivot 
php artisan make:controller WalksController
php artisan make:controller WalksController --resource
php artisan make:component Button
php artisan make:factory CommentFactory
php artisan migrate:fresh --seed
php artisan db:seed --class=ExampleSeeder

# Codes
DB::table('dogs')->insert([
                'name' => fake()->text(maxNbChars:10),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

