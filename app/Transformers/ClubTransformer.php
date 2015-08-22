<?php

namespace App\Transformers;

use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class ClubTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var  array
     */
    protected $availableIncludes = [];

    /**
     * List of resources to automatically include
     *
     * @var  array
     */
    protected $defaultIncludes = ['admins'];

    /**
     * Transform object into a generic array
     *
     * @var  object
     */
    public function transform($resource)
    {
        $data = $resource -> toArray();
        unset( $data['pivot']);
        return $data;
    }

    /**
     * Include admin information
     */
    public function includeAdmins(\App\Club $club){
        return $this -> collection( $club -> admins, new AdminTransformer );
    }

}
