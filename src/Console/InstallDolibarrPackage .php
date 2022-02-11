<?php

namespace Pmilinvest\Dolibarr\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallDolibarrPackage  extends Command
{
    protected $signature = 'dolibarr:install';

    protected $description = 'Install the Dolibarr Package';

    public function handle()
    {
        $this->info('Installing Dolibarr Package...');

        $this->info('Publishing configuration...');

        if (! $this->configExists('dolibarr.php')) {
            $this->publishConfiguration();
            $this->info('Published configuration');
        } else {
            if ($this->shouldOverwriteConfig()) {
                $this->info('Overwriting configuration file...');
                $this->publishConfiguration($force = true);
            } else {
                $this->info('Existing configuration was not overwritten');
            }
        }

        $this->info('Installed Dolibarr Package');
        return 0;
    }

    private function configExists($fileName)
    {
        return File::exists(config_path($fileName));
    }

    private function shouldOverwriteConfig()
    {
        return $this->confirm(
            'Config file already exists. Do you want to overwrite it?',
            false
        );
    }

    private function publishConfiguration($forcePublish = false)
    {
        $params = [
            '--provider' => "namespace Pmilinvest\Dolibarr\DolibarrServiceProvider",
            '--tag' => "config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }
}
