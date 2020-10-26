<?php

namespace App\Jobs;

use App\Models\CommandResult;
use App\Models\Program;
use App\Models\User;
use App\Services\ProgramPreparationServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Process\Process;

class IssueCommandJob implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	protected $command = [];

	protected $result_id;

	/**
	 * Create a new job instance.
	 *
	 * @param Program $program
	 * @param array   $values
	 * @param array   $parameters
	 *
	 * @throws \Exception
	 */
	public function __construct(Program $program, array $values = [], array $parameters = [])
	{
		$this->user = Auth::user()
		                  ->getAuthIdentifier();
		/**
		 * @var $programs ProgramPreparationServiceInterface
		 */
		$programs = app()->make(ProgramPreparationServiceInterface::class);
		//try to pass here one command and some later parameters, along with the values like ip/port etc and check if it returns what it should.
		//we need to find out if the order at which the collection and array come over is taken into consideration. we cant let the resetting happen to only one and not the other.
		$command[] = $program->command;
		if (isset($values[0])) {
			$command[] = $values[0];
		}
		foreach ($parameters as $parameter_id => $bool) {
			// if the id does not belong to this program, throw Exception.
			if (!$bool) {
				continue;
			}
			$parameter = $programs->findParamById($program, $parameter_id);
			if (blank(
				$parameter
			)) {
				throw new \Exception('WRONG PARAMETER ID - ' . $parameter);
			}
			$command[] = $parameter->param;
			$command[] = $values[$parameter_id] ?? '';
		}
		// reset the keys.
		$this->command = $command;
		/**
		 * @var $result CommandResult
		 */
		$result = User::query()->find($this->user)
		              ->results()
		              ->save(
			              CommandResult::factory()
			                           ->makeOne(['command' => implode(' ', $this->command)])
		              );
		$this->result_id = $result->getKey();
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public
	function handle()
	{
		$process = new Process($this->command);
		$result = CommandResult::query()->find($this->result_id);
		$process->run();
		if ($process->isSuccessful()) {
			$result->output = $process->getOutput();
			$result->completed = true;
		} else {
			$result->output = $process->getExitCodeText();
			$result->completed = false;
		}
		$result->completed_at = now();
		$result->save();
		//now do something and add it to the table with "completed jobs". Hold the whole query that was executed, also put all the details back that you received (same formatting, I guess?)
		// do nmap and password crack (password file upload!!)
	}
}
