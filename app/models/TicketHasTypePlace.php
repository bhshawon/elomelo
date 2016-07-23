<?php
namespace models;


use Illuminate\Database\Eloquent\Model;

class TicketHasTypePlace extends Model
{
	protected $table='tickets_hastype_place';

	protected $fillable=['ticket_id', 'place_id'];
}
