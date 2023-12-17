<?php

namespace Module\blog\Models\Traits;

use Module\blog\Models\Post;

trait PostAttributesTrait
{

    public function getStatusNameAttribute()
    {
        return Post::STATUSES[$this->status];
    }

}
