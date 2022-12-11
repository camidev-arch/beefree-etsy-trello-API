<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use TrelloClient;

use Etsy\Etsy;
use Etsy\OAuth\Client as EtsyClient;


class TestController extends Controller
{
    public function index(Request $request)
    {
        $client = new EtsyClient("6lc7gqx9vtu2whpcxmxqta6f");

        $scopes = ["listings_d", "listings_r", "listings_w", "profile_r"];

        $scopes = \Etsy\Utils\PermissionScopes::ALL_SCOPES;

        [$verifier, $code_challenge] = $client->generateChallengeCode();

        $nonce = $client->createNonce();

        $redirect_uri = "https://beefree/test";

        $url = $client->getAuthorizationUrl(
            $redirect_uri,
            $scopes,
            $code_challenge,
            $nonce
        );

        //dd($request, $url);

        $html = "<a href='$url'>Click here to authorize</a>";

        return $html;
        /*
        $client = TrelloClient::setCredentials(
            'de93c8497c78b003587d70647cd08f25',
            '021f3e002e8ebecaf3956cfe4136206ae5b53444ed998d41b49db41b2226214c'
        );

        $boards = $client->getBoards();

        $lists = $client->getListsFromBoard('63963229fe80ce026a9eef03');

        dd($boards, $lists);

        $data = $client->createCard([
            'name' => 'Camilo es Copilot',
            'desc' => 'This is a test card',
            'idList' => '63963229fe80ce026a9eef0a',
            'pos' => 'top'
        ]);

        dd($data);
*/

        /*
        $clienteTrello = new TrelloClient();

        $clienteTrello->authenticate([
            'key' => 'de93c8497c78b003587d70647cd08f25',
            'token' => '021f3e002e8ebecaf3956cfe4136206ae5b53444ed998d41b49db41b2226214c'
        ]);

        $boards = $clienteTrello->getBoards();
        */

        /// funciona

        // Fin funciona

/*
        $client = new EtsyClient("23ucjkslauynu3o5pche7w7p");

        $scopes = ["listings_d", "listings_r", "listings_w", "profile_r"];

        $scopes = \Etsy\Utils\PermissionScopes::ALL_SCOPES;

        [$verifier, $code_challenge] = $client->generateChallengeCode();

        $nonce = $client->createNonce();

        $redirect_uri = "http://beefree/test";

        $url = $client->getAuthorizationUrl(
            $redirect_uri,
            $scopes,
            $code_challenge,
            $nonce
        );

        //dd($request, $url);

        $html = "<a href='$url'>Click here to authorize</a>";

        return $html;*/

        return "hola";
    }

    public function trelloCallback(Request $request)
    {
        /*
        $token = $_GET['oauth_token'];
        $verifier = $_GET['oauth_verifier'];

        $credentials = $client->getAccessToken($token, $verifier);
        $accessToken = $credentials->getIdentifier();*/


        dd($request);

        return "Hola";
    }
}
