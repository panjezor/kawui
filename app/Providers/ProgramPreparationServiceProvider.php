<?php

namespace App\Providers;

use App\Services\ProgramPreparationService;
use App\Services\ProgramPreparationServiceInterface;
use Illuminate\Support\ServiceProvider;

class ProgramPreparationServiceProvider extends ServiceProvider
{
	public
		$bindings = [
		ProgramPreparationServiceInterface::class => ProgramPreparationService::class,
	];

}
