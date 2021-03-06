<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  public function user(){

    return $this->belongsTo(User::class, 'user_id');

  }
  public function priority(){

    return $this->belongsTo(Priority::class, 'priority_id');

  }
  public function category(){

    return $this->belongsTo(Category::class, 'category_id');

  }
  public function status(){

    return $this->belongsTo(Status::class, 'status_id');

  }
}
