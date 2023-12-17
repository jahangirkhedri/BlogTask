<?php

namespace Module\acl\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ADMIN_ROLE = 'admin';
    const AUTHOR_ROLE = 'author';
}
