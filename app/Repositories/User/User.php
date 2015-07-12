<?php

/**
 * @author Rohit Arora
 */

namespace App\Repositories\User;

use App\Adapters\User as UserAdapter;
use App\Contracts\Repositories\User as UserContract;
use App\Models\User\User as UserModel;
use App\Repositories\Base;

/**
 * @author Rohit Arora
 */
class User extends Base implements UserContract
{
    const OFFSET    = 0;
    const LIMIT     = 10;
    const SORT_BY   = UserModel::ID;
    const SORT_TYPE = Base::SORT_ASC;

    /**
     * @param UserModel   $Model
     *
     * @param UserAdapter $Adapter
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
    public function fetch($parameters)
    {
        return $this->setRequestParameters($parameters)
                    ->get();
    }

    /**
     * @author Rohit Arora
     *
     * @param int   $userID
     * @param array $parameters
     *
     * @return User
     */
    public function getByID($userID, $parameters = [ALL_FIELDS])
    {
        return $this->setRequestParameters($parameters)
                    ->find($userID);
    }
}