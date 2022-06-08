<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'contact';

    /**
     * The primary key associated with the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';
    
    /**
     * The type of the primary key associated with the model.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The OTHER values associated with the model.
     * 
     * @var string
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        
    ];
}
