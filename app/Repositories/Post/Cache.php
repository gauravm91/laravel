<?php

/**
 * @author Rohit Arora
 */

namespace App\Repositories\Post;

use App\Contracts\Repositories\Post as PostContract;
use App\Repositories\Repository;
use Illuminate\Cache\Repository as CacheRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * @author Rohit Arora
 */
class Cache extends Repository implements PostContract
{
    /**
     * @var Repository
     */
    private $ContractContract;

    /**
     * @var CacheRepository
     */
    private $Cache;

    /**
     * @param PostContract    $ContractContract
     * @param CacheRepository $Cache
     */
    public function __construct(PostContract $ContractContract, CacheRepository $Cache)
    {
        $this->ContractContract = $ContractContract;
        $this->Cache            = $Cache;
    }

    /**
     * @author Rohit Arora
     *
     * @param array $columns
     *
     * @return Collection
     */
    public function get($columns = ['*'])
    {
        return $this->Cache->remember('posts-' . implode('-', $columns), 60, function () use ($columns) {
            return $this->ContractContract->get($columns);
        });
    }
}