<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Store",
 *     description="Store model",
 *     @OA\Xml(
 *         name="Store"
 *     )
 * )
 */
class Store
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of the store",
     *      example="Store 1"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Etsy Shop ID",
     *      description="Etsy Shop ID",
     *      example="123456789"
     * )
     *
     * @var string
     */
    public $etsy_shop_id;

    /**
     * @OA\Property(
     *      title="Etsy Keystring",
     *      description="Etsy Keystring",
     *      example="123456789"
     * )
     *
     * @var string
     */
    public $etsy_keystring;

    /**
     * @OA\Property(
     *      title="Etsy Shared Secret",
     *      description="Etsy Shared Secret",
     *      example="123456789"
     * )
     *
     * @var string
     */
    public $etsy_shared_secret;

    /**
     * @OA\Property(
     *      title="Trello API Key",
     *      description="Trello API Key",
     *      example="123456789"
     * )
     *
     * @var string
     */
    public $trello_api_key;

    /**
     * @OA\Property(
     *      title="Trello Secret Key",
     *      description="Trello Secret Key",
     *      example="123456789"
     * )
     *
     * @var string
     */
    public $trello_secret;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;
}
