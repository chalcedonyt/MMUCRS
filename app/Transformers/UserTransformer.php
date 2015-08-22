<?php

namespace App\Transformers;

use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class UserTransformer extends TransformerAbstract
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
    protected $defaultIncludes = ['adminOfClubs'];

    /**
     * Transform object into a generic array
     *
     * @var  object
     */
    public function transform(\App\User $user)
    {
        $data = $user -> toArray();
        unset( $data['dob'] );
        unset( $data['gender'] );
        unset( $data['email'] );
        unset( $data['pivot'] );
        return $data;
    }

    /**
     * Clubs that the user is an admin of.
     */
    public function includeAdminOfClubs(\App\User $user){
        return $this -> collection( $user -> adminOfClubs, new ClubTransformer );
    }

}
