<?php

namespace App\Beefree;

class TrelloClient
{
    private $trello_api_key;

    private $trello_api_secret;

    private $api_endpoint = "https://api.trello.com/1/";

    public function setCredentials($key, $secret)
    {
        $this->trello_api_key = $key;
        $this->trello_api_secret = $secret;

        return $this;
    }

    /**
     * Obtiene los tableros de un usuario.
     *
     * @see https://developer.atlassian.com/cloud/trello/rest/api-group-boards/#api-boards-get
     * @return array
     */
    public function getBoards()
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => $this->api_endpoint,
        ]);

        $response = $client->request('GET', 'members/me/boards', [
            'query' => [
                'key' => $this->trello_api_key,
                'token' => $this->trello_api_secret,
            ],
        ]);

        return json_decode($response->getBody()->getContents());
    }

    /**
     * Crea un tablero en Trello a partir de un array con los datos del tablero.
     *
     * @see https://developer.atlassian.com/cloud/trello/rest/api-group-boards/#api-boards-post
     * @param array $data
     * @return array
     */
    public function createBoard($data)
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => $this->api_endpoint,
        ]);

        $response = $client->request('POST', 'boards', [
            'query' => [
                'key' => $this->trello_api_key,
                'token' => $this->trello_api_secret,
            ],
            'form_params' => $data
        ]);

        return json_decode($response->getBody()->getContents());
    }

    /**
     * Obtiene las listas de un tablero a partir de su ID.
     *
     * @see https://developer.atlassian.com/cloud/trello/rest/api-group-boards/#api-boards-id-lists-get
     * @param string $boardId
     * @return array
     */
    public function getListsFromBoard(string $boardId)
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => $this->api_endpoint,
        ]);

        $response = $client->request('GET', "boards/$boardId/lists", [
            'query' => [
                'key' => $this->trello_api_key,
                'token' => $this->trello_api_secret,
            ],
        ]);

        return json_decode($response->getBody()->getContents());
    }

    /**
     * Crea una tarjeta en Trello a partir de un array con los datos de la tarjeta.
     *
     * @see https://developer.atlassian.com/cloud/trello/rest/api-group-cards/#api-cards-post
     * @param array $data
     * @return array
     */
    public function createCard($data)
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => $this->api_endpoint,
        ]);

        $response = $client->request('POST', "cards", [
            'query' => [
                'key' => $this->trello_api_key,
                'token' => $this->trello_api_secret,
            ],
            'form_params' => $data
        ]);

        return json_decode($response->getBody()->getContents());
    }
}
