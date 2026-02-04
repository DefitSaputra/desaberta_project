<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteVisit extends Model
{
    protected $fillable = [
        'session_id',
        'ip',
        'path',
        'method',
        'user_agent',
        'referer',
    ];
}
