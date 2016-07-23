<?php
namespace models;


use Illuminate\Database\Eloquent\Model;

class TicketHasTypeTrip extends Model
{
	protected $table='tickets_hastype_trip';

	protected $fillable=['ticket_id', 'trip_id'];
}
