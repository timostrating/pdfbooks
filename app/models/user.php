<?php 

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {
    public $name;

    public $incrementing = true;

    protected $fillable = ['name', 'email'];
}