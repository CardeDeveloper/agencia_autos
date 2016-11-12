<?php

namespace agencia;

use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ventas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['auto_id', 'vendedor'];

   
}
