<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discussion extends Model {
    use HasFactory;

    protected $fillable = [
        'discussion',
        'bgColor',
        'unit_id',
        'user_id'
    ];

    public function owner(): BelongsTo {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id'
        );
    }

    public function unit(): BelongsTo {
        return $this->belongsTo(
            related: Unit::class,
            foreignKey: 'unit_id'
        );
    }

    public function comments(): HasMany {
        return $this->hasMany(
            related: Comment::class,
            foreignKey: 'discussion_id'
        )->orderBy('created_at', 'DESC');
    }
}
