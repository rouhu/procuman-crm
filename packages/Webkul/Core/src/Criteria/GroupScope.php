<?php

namespace Webkul\Core\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class GroupScope implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param  mixed  $model
     * @param  \Prettus\Repository\Contracts\RepositoryInterface  $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $user = auth()->guard('user')->user();

        if ($user->view_permission === 'group') {
            return $model->where('group_id', $user->group_id);
        }

        return $model;
    }
}
