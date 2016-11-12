<?php

namespace agencia;

use Illuminate\Database\Eloquent\Model;

class auto extends Model
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'autos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'modelo', 'color','precio','existencia','imagen'];

   
}
