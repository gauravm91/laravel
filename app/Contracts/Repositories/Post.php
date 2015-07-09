<?php
/**
 * @author Rohit Arora
 */
namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;

/**
 * @author Rohit Arora
 */
interface Post
{
    /**
     * @author Rohit Arora
     *
     * @param array $parameters
     *
     * @return Collection
     */
    public function get($parameters);
}