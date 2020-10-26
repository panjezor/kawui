<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandDispatchRequest;
use App\Jobs\IssueCommandJob;
use App\Models\CommandResult;
use App\Services\ProgramPreparationServiceInterface;
use Illuminate\Http\Request;

class CommandController extends Controller
{
	private $programs;

	public function __construct(ProgramPreparationServiceInterface $programPreparationService)
	{
		$this->programs = $programPreparationService;
	}

	public function index()
	{
		return view('pages.command.jobs')->with(
			'results', CommandResult::query()
			                        ->orderBy(
				                        'created_at'
			                        )
			                        ->with('user')
			                        ->get()
		);
	}

	public function showRequestForm($name)
	{
		return response()->view(
			'pages.command.form',
			[
				'program' => $this->programs->findProgramByName($name)
				                            ->load('paramCategories.parameters'),
			]
		);
	}

	public function submitJobRequest(CommandDispatchRequest $request)
	{
		$data = $request->validated();
		IssueCommandJob::dispatch(
			$this->programs->findProgramById($data['program_id']), $data['param'], $data['paramcommand'] ?? []
		);

		return redirect(route('command.jobs'));
	}
}
