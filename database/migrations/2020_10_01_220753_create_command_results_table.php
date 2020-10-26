<?php /** @noinspection PhpUnused */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandResultsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create(
			'command_results', function (Blueprint $table) {
			$table->id();
			$table->text('command');
			$table->text('output')->nullable();
			$table->foreignId('user_id')
			      ->references('id')
			      ->on('users')
			      ->nullOnDelete()
			      ->cascadeOnUpdate();
			$table->boolean('completed');

            $table->timestamps();
            $table->timestamp('completed_at')->nullable();
        }
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('command_results');
	}
}
