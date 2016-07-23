<?php
namespace models;


use Illuminate\Database\Eloquent\Model;

class TicketHasTypeEvent extends Model
{
	protected $table='tickets_hastype_event';

	protected $fillable=['ticket_id', 'event_id'];
}
