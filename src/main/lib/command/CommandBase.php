<?php
/**
 * Created by PhpStorm.
 * User: gripinskiy
 * Date: 04.05.16
 * Time: 21:49
 */

namespace webarch\buser\command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use webarch\buser\app\App;

class CommandBase extends Command
{
    /**
     * @var App
     */
    protected $app;

    protected function configure()
    {
        $this->app = App::getInstance();
        $this->addArgument(
            "document-root",
            InputArgument::REQUIRED,
            "Absolute or relative path to Bitrix project document root"
        );
    }

    /**
     * @param InputInterface $input
     */
    protected function includeBitrix(InputInterface $input)
    {
        $this->app->includeBitrix($input->getArgument("document-root"));
    }


}