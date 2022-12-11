<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     schema="StoreResource",
 *     title="StoreResource",
 *     description="Store resource",
 *     @OA\Xml(
 *         name="StoreResource"
 *     )
 * )
 */
class StoreResource
{
    /**
     * @OA\Property(
     *     name="Data"
     * )
     *
     * @var \App\Virtual\Models\Store
     */
    private $data;
}
