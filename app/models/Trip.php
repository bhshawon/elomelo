<?php
namespace models;


use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
	protected $table='trip';

	protected $fillable=['travel_from', 'travel_to', 'vehicle', 'time'];
}
