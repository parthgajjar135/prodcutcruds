<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pro extends Model
{
   protected $primaryKey = 'product_id';

    protected $fillable = [
       'product_name',
       'product_details',
       'product_price',
       'product_qty',       
       'product_image'
   ];
}
