<?php

/**
 * @author Rohit Arora
 */

namespace App\Repositories\Post;

use App\Adapters\Post as PostAdapter;
use App\Contracts\Repositories\Post as PostContract;
use App\Models\Post as PostModel;
use App\Repositories\Repository;

/**
 * @author Rohit Arora
 */
class Post extends Repository implements PostContract
{
    /**
     * @param PostModel   $Model
     *
     * @param PostAdapter $Adapter
     *
     * @internal param PostModel $Post
     */
    public function __construct(PostModel $Model, PostAdapter $Adapter)
    {
        parent::__construct($Model, $Adapter);
    }

    /**
     * @author Rohit Arora
     *
     * @param $parameters
     *
     * @return array
     */
    public function get($parameters)
    {
        $parameters = $this->Adapter->filter(isset($parameters['fields']) ? explode(',', $parameters['fields']) : ['*']);

        if (!$parameters) {
            return [];
        }

        return $this->Adapter->reFilter($parameters, $this->fetch($parameters)
                                                          ->toArray());
    }
}