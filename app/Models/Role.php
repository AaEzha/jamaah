<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRoleModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Role extends SpatieRoleModel
{
    use HasFactory;

    public function jamaah(): BelongsTo
    {
        return $this->belongsTo(Jamaah::class);
    }
}
