<?php

/**
 * @author Rohit Arora
 */

namespace App\Repositories\User;

use App\Adapters\User as UserAdapter;
use App\Contracts\Repositories\User as UserContract;
use App\Models\User as UserModel;
use App\Repositories\Repository;

/**
 * @author Rohit Arora
 */
class User extends Repository implements UserContract
{
    const OFFSET    = 0;
    const LIMIT     = 10;
    const SORT_BY   = UserModel::ID;
    const SORT_TYPE = Repository::SORT_ASC;

    /**
     * @param UserModel   $Model
     *
     * @param UserAdapter $Adapter
     *
     * @internal param UserModel $User
     */
    public function __construct(UserModel $Model, UserAdapter $Adapter)
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
        return $this->process($parameters);
    }
}