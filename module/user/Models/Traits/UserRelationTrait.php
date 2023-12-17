<?php

namespace Module\user\Models\Traits;

use Module\acl\Model\Role;

trait UserRelationTrait
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
