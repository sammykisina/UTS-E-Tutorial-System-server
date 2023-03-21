<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model {
    use HasFactory;

    protected $fillable = [
        'comment',
        'discussion_id',
        'user_id'
    ];

    public function owner(): BelongsTo {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id'
        );
    }
}
