<?php

namespace Socieboy\Jupiter\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jupiter:install {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Jupiter CMS scaffolding into the application';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->installNpmPackageConfig();
        $this->installBowerPackageConfig();
        $this->installGulpFile();
        $this->installServiceProviders();
        $this->installExeptionHandler();
        $this->installRequests();
        $this->installRoutes();
        $this->installModels();
        $this->installMigrations();
        $this->installJupiterConfig();
        $this->installAssets();
        $this->installPublicResources();
        $this->installEnvironmentVariables();
        $this->installTerms();
        $this->call('key:generate');
        $this->table(
            ['Task', 'Status'],
            [
                ['Installing Jupiter Features', '<info>✔</info>'],
            ]
        );

//        $composer = $this->findComposer();
//        (new Process($composer . ' dump-autoload', base_path()))->setTimeout(null)->run();

        if ($this->option('force') || $this->confirm('Would you like to run your database migrations?', 'yes')) {
            (new Process('php artisan migrate', base_path()))->setTimeout(null)->run();
            (new Process('php artisan db:seed', base_path()))->setTimeout(null)->run();
        }
        if ($this->option('force') || $this->confirm('Would you like to install your NPM dependencies?', 'yes')) {
            (new Process('npm install', base_path()))->setTimeout(null)->run();
        }
        if ($this->option('force') || $this->confirm('Would you like to install your Bower dependencies?', 'yes')) {
            (new Process('bower install', base_path()))->setTimeout(null)->run();
        }
        if ($this->option('force') || $this->confirm('Would you like to run Gulp?', 'yes')) {
            (new Process('gulp', base_path()))->setTimeout(null)->run();
        }

        $this->displayPostInstallationNotes();
    }

    /**
     * Install the "package.json" file for the project.
     *
     * @return void
     */
    protected function installNpmPackageConfig()
    {
        copy(
            JUPITER_PATH.'/resources/stubs/package.json',
            base_path('package.json')
        );
    }

    /**
     * Install the "bower.json" file for the project.
     *
     * @return void
     */
    protected function installBowerPackageConfig()
    {
        copy(
            JUPITER_PATH.'/resources/stubs/bower.json',
            base_path('bower.json')
        );
    }

    /**
     * Install the "gulpfile.json" file for the project.
     *
     * @return void
     */
    protected function installGulpFile()
    {
        copy(
            JUPITER_PATH.'/resources/stubs/gulpfile.js',
            base_path('gulpfile.js')
        );
    }

    /**
     * Generate and install the application Jupiter service provider.
     *
     * @return void
     */
    protected function installServiceProviders()
    {
        copy(
            JUPITER_PATH.'/resources/stubs/app/Providers/AuthServiceProvider.php',
            app_path('Providers/AuthServiceProvider.php')
        );
        copy(
            JUPITER_PATH.'/resources/stubs/app/Providers/RouteServiceProvider.php',
            app_path('Providers/RouteServiceProvider.php')
        );
    }

    /**
     * Install the customized Jupiter exceptions.
     *
     * @return void
     */
    protected function installExeptionHandler()
    {
        copy(
            JUPITER_PATH.'/resources/stubs/app/Exceptions/Handler.php',
            app_path('Exceptions/Handler.php')
        );
    }

    /**
     * Install the customized Jupiter requests.
     *
     * @return void
     */
    protected function installRequests()
    {
        copy_folder(
            JUPITER_PATH.'/resources/stubs/app/Http/Requests/Users/',
            app_path('Http/Requests/Users/')
        );
    }

    /**
     * Install the routes for the application.
     *
     * @return void
     */
    protected function installRoutes()
    {
        copy(
            JUPITER_PATH.'/resources/stubs/app/Http/routes.php',
            app_path('Http/routes.php')
        );
    }

    /**
     * Install the user migration file.
     *
     * @return void
     */
    protected function installMigrations()
    {
        copy_folder(
            JUPITER_PATH.'/resources/stubs/database/migrations/',
            database_path('migrations/')
        );
        copy_folder(
            JUPITER_PATH.'/resources/stubs/database/seeds/',
            database_path('seeds/')
        );
    }

    /**
     * Install the jupiter configuration file.
     *
     * @return void
     */
    protected function installJupiterConfig()
    {
        copy(
            JUPITER_PATH.'/resources/stubs/config/jupiter.php',
            config_path('/jupiter.php')
        );
    }

    /**
     * Install the default Assets for the application.
     *
     * @return void
     */
    protected function installAssets()
    {
        copy_folder(
            JUPITER_PATH.'/resources/assets/js',
            base_path('resources/assets/js')
        );
        copy_folder(
            JUPITER_PATH.'/resources/assets/less',
            base_path('resources/assets/less')
        );
    }

    /**
     * Install the public resources for the application.
     *
     * @return void
     */
    protected function installPublicResources()
    {
        if (! is_dir('public/images')) {
            mkdir(base_path('public/images'));
        }
        copy(
            JUPITER_PATH.'/resources/stubs/public/images/avatar.png',
            base_path('public/images/avatar.png')
        );
    }

    /**
     * Install the Models for the application.
     *
     * @return void
     */
    protected function installModels()
    {
        copy(
            JUPITER_PATH.'/resources/stubs/app/User.php',
            app_path('User.php')
        );
        copy_folder(
            JUPITER_PATH.'/resources/stubs/app/Models/',
            base_path('app/Models/')
        );
    }

    /**
     * Install the environment variables for the application.
     *
     * @return void
     */
    protected function installEnvironmentVariables()
    {
        if (! file_exists(base_path('.env'))) {
            return;
        }

        $env = file_get_contents(base_path('.env'));

        if (str_contains($env, 'MANDRILL_SECRET=')) {
            return;
        }

        (new Filesystem)->append(
            base_path('.env'),
            PHP_EOL.'STRIPE_KEY='.PHP_EOL.
            'STRIPE_SECRET='.PHP_EOL
        );
    }

    /**
     * Install the "Terms Of Service" Markdown file.
     *
     * @return void
     */
    protected function installTerms()
    {
        file_put_contents(
            base_path('terms.md'), 'This page is generated from the `terms.md` file in your project root.'
        );
    }

    /**
     * Display the post-installation information to the user.
     *
     * @return void
     */
    protected function displayPostInstallationNotes()
    {
        $this->comment('Post Installation Notes:');
        $this->line(PHP_EOL.'→ Set <info>MANDRILL_SECRET</info> key of your application.');

    }
}