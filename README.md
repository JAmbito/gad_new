NEED TO RUN

php artisan storage:link
php artisan db:seed --class=AddressSeeder
php artisan db:seed --class=UserTableSeeder
php artisan db:seed --class=ManagementTypesTableSeeder
php artisan serve

FOR SEEDING DUMMY DATA MANAGEMENT
php artisan db:seed --class=DepartmentsTableSeeder
php artisan db:seed --class=CampusesTableSeeder
php artisan db:seed --class=AdministrativeRanksTableSeeder
php artisan db:seed --class=AcademicRanksTableSeeder      
php artisan db:seed --class=DesignationsTableSeeder