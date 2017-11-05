<?php 

class User extends baseModel {
    public $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    public $timestamps = false;
}