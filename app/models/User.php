<?php
namespace models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $table='users';

	protected $fillable=['username', 'password', 'salt', 'email', 'created_at', 'updated_at'];
}
