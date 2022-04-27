<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactForm extends Model
{
    protected $table = 'contact_forms';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
    ];
}
