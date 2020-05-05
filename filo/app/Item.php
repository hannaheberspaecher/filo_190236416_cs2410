<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  // specifies which varibales mass-assignable
  protected $fillable = ['foundplace','description', 'other'];

  /**
   * Get the comments for the blog post.
   */
  public function request_items()
  {
    return $this->hasMany('App\RequestItem');
  }


}
