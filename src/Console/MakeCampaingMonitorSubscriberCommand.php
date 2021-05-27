<?php

namespace InfoSalud\CampaingMonitor\Console;

use Illuminate\Console\GeneratorCommand;

class MakeCampaingMonitorSubscriberCommand extends GeneratorCommand
{
    protected $name = 'make:cp-subscriber';

    protected $signature = 'make:cp-subscriber
                            {name : The Class name} 
                            {--id=her-comes-the-id-from-campaing-monitor-list : The List id from Campaing Monitor}';

    protected $description = 'Create a new Caminpaing Monitor Subscriber class';

    protected function getStub()
    {
        return __DIR__ . '/../stubs/subscriber.php.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Subscribers';
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
