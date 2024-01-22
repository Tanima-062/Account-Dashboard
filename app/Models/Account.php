<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Group;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'group_id', 'debit', 'credit'
    ];

    protected $with = ['group'];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

}
