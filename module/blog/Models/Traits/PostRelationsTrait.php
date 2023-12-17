<?php

namespace Module\blog\Models\Traits;

use Module\user\Models\User;

trait PostRelationsTrait
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
