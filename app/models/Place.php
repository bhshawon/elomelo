<?php
namespace models;


use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
	protected $table='place';

	protected $fillable=['location', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
}
