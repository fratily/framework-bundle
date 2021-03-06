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
namespace Fratily\Bundle\Framework;

class FrameworkBundle extends \Fratily\Kernel\Bundle\Bundle{

    /**
     * {@inheritdoc}
     */
    public function commandRegister(
        \Symfony\Component\Console\Application $app,
        array $options = []
    ): void{
        $app->add(
            new Command\RouteShowCommand($this->getKernel()->getRouteCollector())
        );
    }
}