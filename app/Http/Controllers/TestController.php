<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use TrelloClient;

use Etsy\Etsy;
use Etsy\OAuth\Client as EtsyClient;


class TestController extends Controller
{
    public function getClient()
    {
        $client = new EtsyClient("xxxxxxx");

        return $client;
    }

    public function index(Request $request)
    {
        $client = $this->getClient();

        [$verifier, $code_challenge] = $client->generateChallengeCode();

        $scopes = ["listings_d", "listings_r", "listings_w", "profile_r"];

        //write the verifier to a txt file
        $myfile = fopen("verifier.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $verifier);
        fclose($myfile);

        /*
        // write the verifier to the session
        $request->session()->put('verifier', $verifier);
        // write the code challenge to the session
        $request->session()->put('code_challenge', $code_challenge);
        */

        $scopes = \Etsy\Utils\PermissionScopes::ALL_SCOPES;

        $nonce = $client->createNonce();

        $redirect_uri = "https://beefreemedia.com/test";

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

    public function test(Request $request)
    {

        // https://beefreemedia.com/test?
        // code=w7a5cf9_ipQZQzIGGBOhqZpKoxfIFhIRyGx10r45X333UE0LK3ba0Q4yTOuuoUqIldZ2hefcRZNwRE6KouZO2znk6J-MGpC-YxOi
        // &state=106ef7941de8b58feba61362
        //dd($request);

        $client = $this->getClient();

        $nonce = $client->createNonce();

        [$verifier, $code_challenge] = $client->generateChallengeCode();

        // get the verifier from the txt file
        $verifier = file_get_contents("verifier.txt");

        $redirect_uri = "https://beefreemedia.com/test";

        $code = $request->code;

        //dd($code);

        $token = $client->requestAccessToken(
            $redirect_uri,
            $code,
            $verifier
        );

        $access_token = $token['access_token'];
        $refresh_token = $token['refresh_token'];


        $etsy = new \Etsy\Etsy("XXXX", $access_token);

        // Get user.
        $user = $etsy->getUser();

        // Get shop.
        $shop = $user->getShop();

        $transactions = $shop->getTransactions();

        dd($user, $shop);


        // [$access_token, $refresh_token]

        // dd($access_token, $refresh_token);

        return "Hola";
    }
}
