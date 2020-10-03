<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // Table Name
    protected $table = 'categorias';
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
