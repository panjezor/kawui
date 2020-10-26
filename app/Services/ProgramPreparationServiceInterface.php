<?php

namespace App\Services;

use App\Models\Parameter;
use App\Models\Program;

interface ProgramPreparationServiceInterface
{
	public function findProgramByName($name): Program;

	public function findProgramById($id): Program;

	public function findParamByName(Program $program, string $name): Parameter;

	public function findParamById(Program $program, int $id): Parameter;
}