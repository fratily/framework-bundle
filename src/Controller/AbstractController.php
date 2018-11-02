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
namespace Fratily\Bundle\Framework\Controller;

/**
 *
 */
abstract class AbstractController extends \Fratily\Kernel\Controller\AbstractController{

    /**
     * Twigを通じてレスポンスを生成する
     *
     * @param   string  $path
     *  Twigテンプレートファイルパス
     * @param   mixed[] $context
     *  Twigに渡す値の連想配列
     *
     * @throws  \LogicException
     */
    protected function render(string $path, array $context = []){
        if(!$this->getKernel()->getContainer()->has("twig")){
            throw new \LogicException();
        }

        $response   = $this->generateResponse(200);
        $response->getBody()->write(
            $this->getKernel()->getContainer()->get("twig")->render($path, $context)
        );

        return $response;
    }
}