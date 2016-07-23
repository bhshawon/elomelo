<?php
namespace models;


use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	protected $table='tickets';

	protected $fillable=['name', 'description', 'price', 'created_at', 'updated_at'];
}
