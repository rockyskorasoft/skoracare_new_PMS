<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * The packages that include this feature.
     */
    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(
            Package::class,
            'package_features',
            'feature_id',
            'package_id'
        )->withPivot('sort_order')->withTimestamps();
    }
}
