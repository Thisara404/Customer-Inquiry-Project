<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'message'];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    //formatted number
    public function getFormattedPhoneAttribute()
    {
        return $this->phone ? preg_replace('/(\d{3})(\d{3})(\d{4})/', '($1) $2-$3', $this->phone) : null;
    }
}
