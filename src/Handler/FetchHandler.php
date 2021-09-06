<?php

namespace Mia\Video\Handler\MiaVideo;

use Mia\Core\Exception\MiaException;

/**
 * Description of FetchHandler
 * 
 * @OA\Get(
 *     path="/mia_video/fetch/{id}",
 *     summary="MiaVideo Fetch",
 *     tags={"MiaVideo"},
 *     @OA\Parameter(
 *         name="id",
 *         description="Id of Item",
 *         required=true,
 *         in="path"
 *     ),
 *     @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/MiaVideo")
 *     ),
 *     security={
 *         {"bearerAuth": {}}
 *     }
 * )
 *
 * @author matiascamiletti
 */
class FetchHandler extends \Mia\Auth\Request\MiaAuthRequestHandler
{
    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
        // Obtenemos ID si fue enviado
        $itemId = $this->getParam($request, 'id', '');
        // Buscar si existe el tour en la DB
        $item = \Mia\Video\Model\MiaVideo::find($itemId);
        // verificar si existe
        if($item === null){
            throw new MiaException('Not exist');
        }
        // Devolvemos respuesta
        return new \Mia\Core\Diactoros\MiaJsonResponse($item->toArray());
    }
}