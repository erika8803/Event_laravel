<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
      'date' => 'required',
      'title' => 'required',
      'comment' => 'required',
      );
}
