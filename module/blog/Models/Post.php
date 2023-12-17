<?php

namespace Module\blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Module\blog\Models\Traits\PostAttributesTrait;
use Module\blog\Models\Traits\PostRelationsTrait;

class Post extends Model
{
    use HasFactory, SoftDeletes, PostRelationsTrait,PostAttributesTrait;

    const STATUSES = [0 => 'draft', 1 => 'published'];

    protected $fillable = ['title', 'content', 'user_id', 'status'];
}
