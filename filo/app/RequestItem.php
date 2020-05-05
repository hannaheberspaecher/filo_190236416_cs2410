<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestItem extends Model
{
    // specifies which varibales mass-assignable
    protected $fillable = ['reason'];

    /**
    * Get the user record associated with the request.
    */
    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function item()
    {
      return $this->belongsTo('App\Item');
    }
}
