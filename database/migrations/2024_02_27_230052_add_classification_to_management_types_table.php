<?php

use App\ManagementType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClassificationToManagementTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('management_types', function (Blueprint $table) {
            $table->string('classification')->default(ManagementType::CLASSIFICATION_TEACHING);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('management_types', function (Blueprint $table) {
            $table->dropColumn('classification');
        });
    }
}
