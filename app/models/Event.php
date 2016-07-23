<?php
namespace models;


use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $table='event';

	protected $fillable=['location', 'time'];
}
