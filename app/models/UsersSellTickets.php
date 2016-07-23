<?php
namespace models;


use Illuminate\Database\Eloquent\Model;

class UsersSellTickets extends Model
{
	protected $table='users_sell_tickets';

	protected $fillable=['user_id', 'ticket_id', 'quantity', 'created_at'];
}
