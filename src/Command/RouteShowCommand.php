<?php
/**
 * FratilyPHP Framework Bundle
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.
 * Redistributions of files must retain the above copyright notice.
 *
 * @author      Kento Oka <kento-oka@kentoka.com>
 * @copyright   (c) Kento Oka
 * @license     MIT
 * @since       1.0.0
 */
namespace Fratily\Bundle\Framework\Command;

use Fratily\Router\RouteCollector;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;

/**
 *
 */
class RouteShowCommand extends Command{

    const HELP  = <<<HELP
This is routing command.
HELP;

    /**
     * @var RouteCollector
     */
    private $routeCollector;

    public function __construct(RouteCollector $routeCollector){
        parent::__construct();

        $this->routeCollector   = $routeCollector;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure(){
        $this
            ->setName("debug:router:show")
            ->setDefinition([])
            ->setDescription("Displays current routes for an application")
            ->setHelp(self::HELP)
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output){
        $table  = new Table($output);


        $table->setHeaders(["Name", "Path", "Method", "Allows"]);

        foreach($this->routeCollector->getAll() as $route){
            $table->addRow([
                $route->getName(),
                $route->getPath(),
                $route->getHost(),
                implode(", ", $route->getAllows())
            ]);
        }

        $table->render();
    }
}