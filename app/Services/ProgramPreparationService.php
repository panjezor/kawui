<?php

namespace App\Services;

use App\Models\Parameter;
use App\Models\Program;

/**
 * Class ProgramPreparationService
 *
 * @package App\Services
 */
class ProgramPreparationService implements ProgramPreparationServiceInterface
{
	/**
	 * @param $name
	 *
	 * @return Program
	 */
	public function findProgramByName($name): Program
	{
		return Program::query()
		              ->where('name', '=', $name)
		              ->firstOrFail();
	}

	/**
	 * @param $id
	 *
	 * @return Program
	 */
	public function findProgramById($id): Program
	{
		return Program::query()
		              ->findOrFail($id);
	}

	/**
	 * @param Program $program
	 * @param string  $name
	 *
	 * @return Parameter
	 */
	public function findParamByName(Program $program, string $name): Parameter
	{
		return $program->parameters()
		               ->where('param', '=', $name)
		               ->first();
	}

	/**
	 * @param Program $program
	 * @param int     $id
	 *
	 * @return Parameter
	 */
	public function findParamById(Program $program, int $id): Parameter
	{
		return $program->parameters()
		               ->find($id);
	}
}