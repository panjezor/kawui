<?php /** @noinspection PhpComposerExtensionStubsInspection */

namespace Tests\Feature;

use App\Jobs\IssueCommandJob;
use App\Models\Program;
use App\Models\User;
use App\Services\ProgramPreparationServiceInterface;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IssueCommandTest extends TestCase
{
	use RefreshDatabase;


	public function testCanDoLs()
	{
		$user = User::factory()
		            ->createOne();
		/** @var User $user */
		$this->actingAs(
			$user
		);
		IssueCommandJob::dispatchSync(
			Program::factory()
			       ->makeOne(['command' => 'ls'])
		);
		$result = $user->results->first();
		$this->assertTrue(filled($result->output));
		$this->assertTrue($result->completed);
	}

	/**
	 * A basic feature test example.
	 *
	 * @return void
	 * @throws BindingResolutionException
	 * @depends testCanDoLs
	 */
	public function testCanDoNmapDofustemple()
	{
		/**
		 * @var $programs ProgramPreparationServiceInterface
		 */
		$programs = $this->app->make(ProgramPreparationServiceInterface::class);
		$program = 'nmap'; // we fake the program and param data
		$target = 'dofus-temple.com';
		$programModel = $programs->findProgramByName($program);
		$values[0] = $target;
		$parameters = [];
		$parameter1 =
			$programs->findParamByName($programModel, '-sV')->getKey();
		// if we want, we add an additional parameter to $values[$parameter1->getKey()]
		$parameters[$parameter1] = true;
		// usually we get an array of names, which we then look up and prepare the array to get to.
		// user gets on the program page, picks the checkboxes with the options he wants, then proceeds to job dispatch
		// the request is formed as ['program_id'=>'program_id','target'=>'firstparam/null,'option[id]'=>'true/false','target[id]'=>'something/null'
		$user = User::factory()
		            ->createOne();
		/** @var User $user */
		$this->actingAs(
			$user
		);
		IssueCommandJob::dispatchSync($programModel, $values, $parameters);
		$this->checkResult();

	}

	/**
	 * @throws BindingResolutionException
	 * @depends testCanDoNmapDofustemple
	 */
	public function testCanHitController()
	{
		(new DatabaseSeeder())->run();
		/**
		 * @var $programs ProgramPreparationServiceInterface
		 */
		$programs = $this->app->make(ProgramPreparationServiceInterface::class);
		$program = $programs->findProgramByName('nmap'); // we fake the program and param data
		$target = 'dofus-temple.com';
		$request = [
			'program_id' => $program->getKey(), // check for model
			'param[0]' => $target,
			'paramcommand[' . $programs->findParamByName($program, '-sV')
			                           ->getKey() . ']' => true,
		];
		$user = User::factory()
		            ->create();
		$this->actingAs(
			$user
		);
		$this->assertTrue(
			json_decode(
				$this->post(route('command.dispatch', $request))
				     ->content(), true
			)['message'] === 'true'
		);
		$this->checkResult();
	}

	private function checkResult()
	{
		$result = auth()
			->user()
			->results()
			->first();
		$this->assertTrue(filled($result->output));
		$this->assertTrue($result->completed);
	}
}
