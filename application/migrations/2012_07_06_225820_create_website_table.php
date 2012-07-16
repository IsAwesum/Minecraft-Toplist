<?php

class Create_Website_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('websites', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('ip');
			$table->string('port');
			$table->text('body');
			$table->integer('owner');
			$table->integer('votes');
			$table->integer('premium');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('websites');
	}

}