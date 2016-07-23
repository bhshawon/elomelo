<?php
namespace models;


use Illuminate\Database\Eloquent\Model;

class UsersBuyTickets extends Model
{
	protected $table='users_buy_tickets';

	protected $fillable=['user_id', 'ticket_id', 'status', 'quantity', 'created_at'];
}
