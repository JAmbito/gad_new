# BPSU - Gender and Development

## Fresh set up?
Run the steps below:
1. Run composer install - This will download all PHP dependency packages
2. Copy `.env.example` to `.env` - This is used for ENVIRONMENT variables read by Laravel
3. Run php artisan key:generate - This will create an application key inside .env
4. Run php artisan storage:link - This will create symlink to public/storage directory
5. Run php artisan migrate - This will create the tables and all necessary sql scripts
6. Run php artisan db:seed --class=AddressSeeder - This will seed the regions, provinces, cities and barangays table. See @yajra/laravel-address
7. Run php artisan db:seed --class=UserTableSeeder - This will create the superadmin@gmail.com account with default password of "P@ssw0rd"
8. Run php artisan db:seed --class=ManagementTypesTableSeeder - This is default requirement for management types
9. Run php artisan serve (optional) - Run a php server, otherwise set it up using Apache or Nginx

## Existing set up?
Please drop the existing database or all the tables then proceed with the steps in `Fresh set up?` section.

## Optional seeders (For development)
php artisan db:seed --class=DepartmentsTableSeeder
php artisan db:seed --class=CampusesTableSeeder
php artisan db:seed --class=AdministrativeRanksTableSeeder
php artisan db:seed --class=AcademicRanksTableSeeder      
php artisan db:seed --class=DesignationsTableSeeder
