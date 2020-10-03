<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Marca extends Model
{
    // Table Name
    protected $table = 'marcas';
    // Primary Key
    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'is_active',
    ];

}
