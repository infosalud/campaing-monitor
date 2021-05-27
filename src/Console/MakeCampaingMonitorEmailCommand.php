<?php

namespace InfoSalud\CampaingMonitor\Console;

use Illuminate\Console\GeneratorCommand;

class MakeCampaingMonitorEmailCommand extends GeneratorCommand
{
    protected $name = 'make:cp-email';

    protected $signature = 'make:cp-email 
                            {name : The Class name} 
                            {--id=her-comes-the-id-from-campaing-monitor : The Email id from Campaing Monitor}';

    protected $description = 'Create a new Caminpaing Monitor Email class';

    protected function getStub()
    {
        return __DIR__ . '/../stubs/email.php.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Emails';
    }

    public function handle()
    {
        parent::handle();

        $this->doOtherOperations();
    }

    protected function doOtherOperations()
    {
        // Get the fully qualified class name (FQN)
        $class = $this->qualifyClass($this->getNameInput());

        // get the destination path, based on the default namespace
        $path = $this->getPath($class);

        $content = file_get_contents($path);

        // Update the file content with additional data (regular expressions)

        file_put_contents($path, $content);
    }
}
