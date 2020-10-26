<?php

namespace App\Models;

use App\Support\Models\ParameterCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
	use HasFactory;

	public function program()
	{
		return $this->hasOneThrough(
			Program::class, ParamCategory::class, 'id', 'id', 'param_category_id', 'program_id'
		);
	}

	public function category()
	{
		return $this->belongsTo(ParamCategory::class);
	}
}
