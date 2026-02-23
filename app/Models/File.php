<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasUuids;

    protected $appends = [
        'path_url',
    ];

    protected function pathUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value, array $attributes) => Storage::url($attributes['path']),
        );
    }
}
