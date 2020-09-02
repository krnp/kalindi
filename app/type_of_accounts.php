<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_of_accounts extends Model
{
    protected $table = 'type_of_accounts';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_name', 'closes_to', 'put_title_as', 'control_as', 'control_narr', 'personal', 'summarise_it', 'print_order',
    ];
}
