<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class Sistema extends AbstractMigration
{
	/**
	 * Change Method.
	 *
	 * More information on this method is available here:
	 * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
	 * @return void
	 */
	public function change()
	{
		$this->table('companies')
			->addColumn('name', 'string')
			->addColumn('user_id', 'integer')
			->addColumn('created', 'datetime')
			->addColumn('modified', 'datetime')
			->create();

		$this->table('systems')
			->addColumn('name', 'string')
			->addColumn('user_id', 'integer')
			->addColumn('created', 'datetime')
			->addColumn('modified', 'datetime')
			->create();

		$this->table('activities')
			->addColumn('description', 'text')
			->addColumn('origin', 'string', ['null' => true])
			->addColumn('company_id', 'integer', ['null' => true])
			->addColumn('system_id', 'integer', ['null' => true])
			->addColumn('user_id', 'integer')
			->addColumn('created', 'datetime')
			->addColumn('modified', 'datetime')
			->create();
	}
}
