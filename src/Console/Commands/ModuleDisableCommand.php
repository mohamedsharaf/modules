<?php
namespace Caffeinated\Modules\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class ModuleDisableCommand extends Command
{
	/**
	 * @var string $name The console command name.
	 */
	protected $name = 'module:disable';

	/**
	 * @var string $description The console command description.
	 */
	protected $description = 'Disable a module';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$module = $this->argument('module');

		if ($this->laravel['modules']->isEnabled($this->argument('module'))) {
			$this->laravel['modules']->disable($module);

			$this->info("Module [{$module}] was disabled successfully.");
		} else {
			$this->comment("Module [{$module}] is already disabled.");
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['module', InputArgument::REQUIRED, 'Module slug.']
		];
	}
}
