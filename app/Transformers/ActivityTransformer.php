<?php

namespace App\Transformers;

use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class ActivityTransformer extends TransformerAbstract
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
    protected $defaultIncludes = ['club'];

    /**
     * Transform object into a generic array
     *
     * @var  object
     */
    public function transform(\App\Activity $activity)
    {
        return $activity -> toArray();
    }

    /**
     * Include club information
     */
    public function includeClub( \App\Activity $activity){
        return $this -> item( $activity -> club, new ClubTransformer );
    }

}
