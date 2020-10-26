<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandResult extends Model
{
	use HasFactory;

	protected $attributes = [
		'completed' => 0,
	];
	protected $casts = ['completed' => 'bool'];
	protected $dates = ['completed_at'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
