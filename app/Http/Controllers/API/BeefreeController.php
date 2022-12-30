<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeefreeController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/etsy/test-apikey/{apikey}",
     *      tags={"Beefree"},
     *      summary="Endpoint to test whether a given API key is valid",
     *      description="Test APIKEY",
     *      @OA\Parameter(
     *          name="apikey",
     *          description="Apikey id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *  )
     */
    public function test(Request $request)
    {
        return response()->json([
            'message' => 'Tortolo'
        ], 400);
    }
}
