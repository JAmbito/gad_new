<?php

namespace App\Support;

use App\User;

/**
 * Single source of truth for Roles and Permissions definitions
 * When adding new roles or permission please don't forget to create
 * a new migration file that registers these new roles to Laravel PermissionServiceProvider
 */
class RoleSupport
{
    public const ROLE_ENCODER = 'encoder';
    public const ROLE_APPROVER = 'approver';
    public const ROLE_ADMINISTRATOR = 'administrator';
    public const ROLE_SUPERADMINISTRATOR = 'super administrator';

    public const PERMSSION_READ_DASHBOARD = 'read dashboard';
    public const PERMISSION_DOWNLOAD_PERSONNEL = 'download personnel';
    public const PERMISSION_GENERATE_REPORT = 'generate report';
    public const PERMISSION_CREATE_PERSONNEL = 'create personnel';
    public const PERMISSION_UPDATE_PERSONNEL = 'update personnel';
    public const PERMISSION_DELETE_PERSONNEL = 'delete personnel';
    public const PERMISSION_ARCHIVE_PERSONNEL = 'archive personnel';
    public const PERMISSION_READ_PERSONNEL = 'read personnel';
    public const PERMISSION_REVIEW_PERSONNEL_STATUS = 'review personnel status';
    public const PERMISSION_CREATE_CAMPUS = 'create campus';
    public const PERMISSION_UPDATE_CAMPUS = 'update campus';
    public const PERMISSION_READ_CAMPUS = 'read campus';
    public const PERMSSION_DELETE_CAMPUS = 'delete campus';
    public const PERMISSION_CREATE_DESIGNATION = 'create designation';
    public const PERMISSION_UPDATE_DESIGNATION = 'update designation';
    public const PERMISSION_READ_DESIGNATION = 'read designation';
    public const PERMISSION_DELETE_DESIGNATION = 'delete designation';
    public const PERMISSION_CREATE_MANAGEMENT_TYPE = 'create management type';
    public const PERMISSION_UPDATE_MANAGEMENT_TYPE = 'update management type';
    public const PERMISSION_READ_MANAGEMENT_TYPE = 'read management type';
    public const PERMISSION_DELETE_MANAGEMENT_TYPE = 'delete management type';
    public const PERMISSION_CREATE_ADMINISTRATIVE_RANK = 'create administrative rank';
    public const PERMISSION_UPDATE_ADMINISTRATIVE_RANK = 'update administrative rank';
    public const PERMISSION_READ_ADMINISTRATIVE_RANK = 'read administrative rank';
    public const PERMISSION_DELETE_ADMINISTRATIVE_RANK = 'delete administrative rank';
    public const PERMISSION_CREATE_ACADEMIC_RANK = 'create academic rank';
    public const PERMISSION_UPDATE_ACADEMIC_RANK = 'update academic rank';
    public const PERMISSION_READ_ACADEMIC_RANK = 'read academic rank';
    public const PERMISSION_DELETE_ACADEMIC_RANK = 'delete academic rank';
    public const PERMISSION_CREATE_DEPARTMENT = 'create department';
    public const PERMISSION_UPDATE_DEPARTMENT = 'update department';
    public const PERMISSION_READ_DEPARTMENT = 'read department';
    public const PERMISSION_DELETE_DEPARTMENT = 'delete department';
    public const PERMISSION_CREATE_SYSTEM_USER = 'create system user';
    public const PERMISSION_UPDATE_SYSTEM_USER = 'update system user';
    public const PERMISSION_READ_SYSTEM_USER = 'read system user';
    public const PERMISSION_DELETE_SYSTEM_USER = 'delete system user';
    public const PERMISSION_READ_ACTIVITY_LOG = 'read activity log';

    public static function getPermissionsByRole(string $role): array
    {
        switch ($role) {
            case self::ROLE_SUPERADMINISTRATOR:
                return self::getAllPermissions();
            case self::ROLE_ADMINISTRATOR:
                return [
                  self::PERMISSION_READ_PERSONNEL,
                  self::PERMISSION_GENERATE_REPORT,
                  self::PERMISSION_DOWNLOAD_PERSONNEL,
                  self::PERMSSION_READ_DASHBOARD,
                ];
            case self::ROLE_APPROVER:
                return [
                    self::PERMISSION_READ_PERSONNEL,
                    self::PERMISSION_REVIEW_PERSONNEL_STATUS,
                    self::PERMSSION_READ_DASHBOARD,
                ];
            case self::ROLE_ENCODER:
                return [
                    self::PERMSSION_READ_DASHBOARD,
                    self::PERMISSION_READ_PERSONNEL,
                    self::PERMISSION_CREATE_PERSONNEL,
                ];
            default:
                return [];
        }
    }

    public static function getAllRoles(): array
    {
        return [
            self::ROLE_SUPERADMINISTRATOR,
            self::ROLE_ADMINISTRATOR,
            self::ROLE_ENCODER,
            self::ROLE_APPROVER
        ];
    }

    public static function getAllPermissions(): array
    {
        return [
            self::PERMSSION_READ_DASHBOARD,
            self::PERMISSION_DOWNLOAD_PERSONNEL,
            self::PERMISSION_GENERATE_REPORT,
            self::PERMISSION_CREATE_PERSONNEL,
            self::PERMISSION_UPDATE_PERSONNEL,
            self::PERMISSION_ARCHIVE_PERSONNEL,
            self::PERMISSION_READ_PERSONNEL,
            self::PERMISSION_REVIEW_PERSONNEL_STATUS,
            self::PERMISSION_CREATE_CAMPUS,
            self::PERMISSION_UPDATE_CAMPUS,
            self::PERMISSION_READ_CAMPUS,
            self::PERMSSION_DELETE_CAMPUS,
            self::PERMISSION_CREATE_DESIGNATION,
            self::PERMISSION_UPDATE_DESIGNATION,
            self::PERMISSION_READ_DESIGNATION,
            self::PERMISSION_DELETE_DESIGNATION,
            self::PERMISSION_CREATE_MANAGEMENT_TYPE,
            self::PERMISSION_UPDATE_MANAGEMENT_TYPE,
            self::PERMISSION_READ_MANAGEMENT_TYPE,
            self::PERMISSION_DELETE_MANAGEMENT_TYPE,
            self::PERMISSION_CREATE_ADMINISTRATIVE_RANK,
            self::PERMISSION_UPDATE_ADMINISTRATIVE_RANK,
            self::PERMISSION_READ_ADMINISTRATIVE_RANK,
            self::PERMISSION_DELETE_ADMINISTRATIVE_RANK,
            self::PERMISSION_CREATE_ACADEMIC_RANK,
            self::PERMISSION_UPDATE_ACADEMIC_RANK,
            self::PERMISSION_READ_ACADEMIC_RANK,
            self::PERMISSION_DELETE_ACADEMIC_RANK,
            self::PERMISSION_CREATE_DEPARTMENT,
            self::PERMISSION_UPDATE_DEPARTMENT,
            self::PERMISSION_READ_DEPARTMENT,
            self::PERMISSION_DELETE_DEPARTMENT,
            self::PERMISSION_CREATE_SYSTEM_USER,
            self::PERMISSION_UPDATE_SYSTEM_USER,
            self::PERMISSION_READ_SYSTEM_USER,
            self::PERMISSION_UPDATE_ACADEMIC_RANK,
            self::PERMISSION_READ_ACADEMIC_RANK,
            self::PERMISSION_DELETE_ACADEMIC_RANK,
            self::PERMISSION_CREATE_DEPARTMENT,
            self::PERMISSION_UPDATE_DEPARTMENT,
            self::PERMISSION_READ_DEPARTMENT,
            self::PERMISSION_DELETE_DEPARTMENT,
            self::PERMISSION_CREATE_SYSTEM_USER,
            self::PERMISSION_UPDATE_SYSTEM_USER,
            self::PERMISSION_READ_SYSTEM_USER,
            self::PERMISSION_DELETE_SYSTEM_USER,
            self::PERMISSION_READ_ACTIVITY_LOG,
        ];
    }

    public static function getDataManagementPermissions(): array
    {
        return [
            self::PERMISSION_CREATE_CAMPUS,
            self::PERMISSION_UPDATE_CAMPUS,
            self::PERMISSION_READ_CAMPUS,
            self::PERMSSION_DELETE_CAMPUS,
            self::PERMISSION_CREATE_DESIGNATION,
            self::PERMISSION_UPDATE_DESIGNATION,
            self::PERMISSION_READ_DESIGNATION,
            self::PERMISSION_DELETE_DESIGNATION,
            self::PERMISSION_CREATE_MANAGEMENT_TYPE,
            self::PERMISSION_UPDATE_MANAGEMENT_TYPE,
            self::PERMISSION_READ_MANAGEMENT_TYPE,
            self::PERMISSION_DELETE_MANAGEMENT_TYPE,
            self::PERMISSION_CREATE_ADMINISTRATIVE_RANK,
            self::PERMISSION_UPDATE_ADMINISTRATIVE_RANK,
            self::PERMISSION_READ_ADMINISTRATIVE_RANK,
            self::PERMISSION_DELETE_ADMINISTRATIVE_RANK,
            self::PERMISSION_CREATE_ACADEMIC_RANK,
            self::PERMISSION_UPDATE_ACADEMIC_RANK,
            self::PERMISSION_READ_ACADEMIC_RANK,
            self::PERMISSION_DELETE_ACADEMIC_RANK,
            self::PERMISSION_CREATE_DEPARTMENT,
            self::PERMISSION_UPDATE_DEPARTMENT,
            self::PERMISSION_READ_DEPARTMENT,
            self::PERMISSION_DELETE_DEPARTMENT,
        ];
    }

    public static function getPersonnelPermissions()
    {
        return [
            self::PERMISSION_READ_PERSONNEL,
            self::PERMISSION_CREATE_PERSONNEL,
            self::PERMISSION_UPDATE_PERSONNEL,
            self::PERMISSION_DELETE_PERSONNEL,
            self::PERMISSION_ARCHIVE_PERSONNEL,
            self::PERMISSION_REVIEW_PERSONNEL_STATUS,
        ];
    }

    public static function getSystemPermissions(): array
    {
        return [
            self::PERMISSION_READ_SYSTEM_USER,
            self::PERMISSION_CREATE_SYSTEM_USER,
            self::PERMISSION_UPDATE_SYSTEM_USER,
            self::PERMISSION_DELETE_SYSTEM_USER,
            self::PERMISSION_READ_ACTIVITY_LOG,
        ];
    }

    public static function hasSystemPermissions(User $user): bool
    {
        $userPermissions = $user->getAllPermissions()->pluck('name')->toArray();
        $intersect = array_intersect(self::getSystemPermissions(), $userPermissions);
        return count($intersect) > 0;
    }

    public static function hasPersonnelPermissions(User $user): bool
    {
        $userPermissions = $user->getAllPermissions()->pluck('name')->toArray();
        $intersect = array_intersect(self::getPersonnelPermissions(), $userPermissions);
        return count($intersect) > 0;
    }

    public static function hasDataManagementPermissions(User $user): bool
    {
        $userPermissions = $user->getAllPermissions()->pluck('name')->toArray();
        $intersect = array_intersect(self::getDataManagementPermissions(), $userPermissions);
        return count($intersect) > 0;
    }
}
