<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EtsyController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/etsy/test-apikey/{apikey}",
     *      tags={"Etsy"},
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
    public function testApiKey(Request $request, $apikey)
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', "https://api.etsy.com/v3/application/openapi-ping", [
            'headers' => [
                'x-api-key' => $apikey
            ],
            'http_errors' => false
        ]);

        if ($response->getStatusCode() != 200) {
            return response()->json([
                'message' => 'Invalid API Key'
            ], 400);
        }

        return json_decode($response->getBody()->getContents());
    }
}
