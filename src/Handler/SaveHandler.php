<?php

namespace Mia\Video\Handler;

/**
 * Description of SaveHandler
 * 
 * @OA\Post(
 *     path="/mia_video/save",
 *     summary="MiaVideo Save",
 *     tags={"MiaVideo"},
*      @OA\RequestBody(
 *         description="Object",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(ref="#/components/schemas/MiaVideo")
 *         )
 *     ),
 *     @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/MiaVideo")
 *     ),
 *     security={
 *         {"bearerAuth": {}}
 *     },
 * )
 *
 * @author matiascamiletti
 */
class SaveHandler extends \Mia\Auth\Request\MiaAuthRequestHandler
{
    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface 
    {
        // Obtener item a procesar
        $item = $this->getForEdit($request);
        // Guardamos data
        $item->title = $this->getParam($request, 'title', '');
        $item->slug = $this->getParam($request, 'slug', '');
        $item->author = $this->getParam($request, 'author', '');
        $item->author_url = $this->getParam($request, 'author_url', '');
        $item->caption = $this->getParam($request, 'caption', '');
        $item->photo = $this->getParam($request, 'photo', '');
        $item->video = $this->getParam($request, 'video', '');
        $item->type = intval($this->getParam($request, 'type', ''));
        $item->creator_id = intval($this->getParam($request, 'creator_id', ''));
        $item->summary = $this->getParam($request, 'summary', '');
        $item->status = intval($this->getParam($request, 'status', ''));
        
        try {
            $item->save();
        } catch (\Exception $exc) {
            return new \Mia\Core\Diactoros\MiaJsonErrorResponse(-2, $exc->getMessage());
        }

        // Devolvemos respuesta
        return new \Mia\Core\Diactoros\MiaJsonResponse($item->toArray());
    }
    
    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \App\Model\MiaVideo
     */
    protected function getForEdit(\Psr\Http\Message\ServerRequestInterface $request)
    {
        // Obtenemos ID si fue enviado
        $itemId = $this->getParam($request, 'id', '');
        // Buscar si existe el item en la DB
        $item = \Mia\Video\Model\MiaVideo::find($itemId);
        // verificar si existe
        if($item === null){
            return new \Mia\Video\Model\MiaVideo();
        }
        // Devolvemos item para editar
        return $item;
    }
}