<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\OpenApi(
 *  @OA\Info(
 *      title="Beefree API",
 *      version="1.0.0",
 *      description="Documentacion de Beefree API que integra Etsy y Trello",
 *      @OA\Contact(
 *          email="jnkreationsdev@gmail.com"
 *      )
 *  ),
 *  @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Demo API Server"
 *  ),
 *  @OA\PathItem(
 *      path="/"
 *  )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
