<?php
/**
 * @author Rohit Arora
 */

namespace App\Adapters;

use App\Contracts\Adapter as AdapterContract;
use App\Models\Post as PostModel;
use App\Repositories\User\User;

/**
 * @author  Rohit Arora
 *
 * Class Post
 * @package App\Adapters
 */
class Post extends Base implements AdapterContract
{
    const ID         = 'id';
    const TITLE      = 'title';
    const BODY       = 'body';
    const USER       = 'user';
    const USER_ID    = 'user_id';
    const COMMENT    = 'comment';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * @author Rohit Arora
     *
     * @return array
     */
    public function getBindings()
    {
        return [
            self::ID         => [self::PROPERTY  => PostModel::ID,
                                 self::DATA_TYPE => self::TYPE_INTEGER],
            self::TITLE      => [self::PROPERTY  => PostModel::TITLE,
                                 self::DATA_TYPE => self::TYPE_STRING],
            self::BODY       => [self::PROPERTY  => PostModel::BODY,
                                 self::DATA_TYPE => self::TYPE_STRING],
            self::USER_ID    => [self::PROPERTY  => PostModel::USER_ID,
                                 self::DATA_TYPE => self::TYPE_INTEGER],
            self::USER       => [self::DATA_TYPE => self::TYPE_RESOURCE,
                                 self::CALLBACK  => ['class'        => User::class,
                                                     'function'     => 'getByID',
                                                     self::PROPERTY => PostModel::USER_ID]],
            self::CREATED_AT => [self::PROPERTY  => PostModel::CREATED_AT,
                                 self::DATA_TYPE => self::TYPE_DATETIME],
            self::UPDATED_AT => [self::PROPERTY  => PostModel::UPDATED_AT,
                                 self::DATA_TYPE => self::TYPE_DATETIME]
        ];
    }
}