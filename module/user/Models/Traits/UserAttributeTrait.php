<?php

namespace Module\user\Models\Traits;

use Module\acl\Model\Role;

trait UserAttributeTrait
{
    public function getIsAdminAttribute()
    {
        return  $this->roles->contains('slug',Role::ADMIN_ROLE);
    }
    public function getIsAuthorAttribute()
    {
        return  $this->roles->contains('slug',Role::AUTHOR_ROLE);
    }

    public function getRoleNamesAttribute()
    {
        return implode(",",$this->roles()->pluck('roles.title')->toArray());
    }

}
