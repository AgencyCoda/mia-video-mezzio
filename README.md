# mia-video-mezzio

1. Incluir libreria:
```bash
composer require agencycoda/mia-video-mezzio
```
2. Incluir rutas:
```php
$app->route('/mia-video/fetch/{id}', [\Mia\Auth\Handler\AuthHandler::class, \Mia\Video\Handler\MiaVideo\FetchHandler::class], ['GET', 'OPTIONS', 'HEAD'], 'mia_video.fetch');
$app->route('/mia-video/list', [\Mia\Auth\Handler\AuthHandler::class, \Mia\Video\Handler\MiaVideo\ListHandler::class], ['POST', 'OPTIONS', 'HEAD'], 'mia_video.list');
$app->route('/mia-video/remove/{id}', [\Mia\Auth\Handler\AuthHandler::class, new \Mia\Auth\Middleware\MiaRoleAuthMiddleware([MIAUser::ROLE_ADMIN]), \Mia\Video\Handler\MiaVideo\RemoveHandler::class], ['GET', 'DELETE', 'OPTIONS', 'HEAD'], 'mia_video.remove');
$app->route('/mia-video/save', [\Mia\Auth\Handler\AuthHandler::class, new \Mia\Auth\Middleware\MiaRoleAuthMiddleware([MIAUser::ROLE_ADMIN]), \Mia\Video\Handler\MiaVideo\SaveHandler::class], ['POST', 'OPTIONS', 'HEAD'], 'mia_video.save');
```