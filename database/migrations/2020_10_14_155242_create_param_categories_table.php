<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParamCategoriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create(
			'param_categories', function (Blueprint $table) {
			$table->id();
			$table->foreignId('program_id')
			      ->constrained()
			      ->cascadeOnDelete();
			$table->string('title');
			$table->string('name');
			$table->unique(['program_id', 'name']);
			$table->timestamps();
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
		Schema::dropIfExists('param_categories');
	}
}
