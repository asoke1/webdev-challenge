<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryCategory extends Model
{
    /**
     * This attribute defines table name.
     */
    protected $table = 'nri_category';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nri_category'
    ];
}
