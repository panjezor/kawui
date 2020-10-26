<?php

namespace App\Http\Requests;

use App\Models\Program;
use Illuminate\Foundation\Http\FormRequest;

class CommandDispatchRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'program_id' => ['required','exists:'.Program::class.',id'], // check for model
			'param.0' => [],
			'paramcommand.*' => [],
			'param.*' => [],
		];
	}
}
