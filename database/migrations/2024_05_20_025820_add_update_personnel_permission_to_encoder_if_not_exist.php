<?php

use App\Support\RoleSupport;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AddUpdatePersonnelPermissionToEncoderIfNotExist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $role = Role::findByName(RoleSupport::ROLE_ENCODER);
        $permission = Permission::findByName(RoleSupport::PERMISSION_UPDATE_PERSONNEL);
        if (!$role->hasPermissionTo($permission)) {
            $role->givePermissionTo($permission);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $role = Role::findByName(RoleSupport::ROLE_ENCODER);
        $permission = Permission::findByName(RoleSupport::PERMISSION_UPDATE_PERSONNEL);
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
        }
    }
}
