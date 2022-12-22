<?php

namespace App\Repositories;
use App\Models\User;

class UserRepository extends Repository
{  
    /**
     * get model
     * @return string
     */
    public function getModel(){
        return 'App\Models\User';
    }
    
    /**
     * findPaginatedUser
     *
     * @param  mixed $filters
     * @param  mixed $options
     * @return void
     */
    public function findPaginatedUser($filters = [], $options = [])
    {
        $page = $filters['page'] ?? 1;
        $pageSize = $filters['pageSize'] ?? 10;
        $keyword = $filters['keyword'] ?? '%';

        $sortBy = $options['sortBy'] ?? 'created_at';
        $sort = $options['sort'] ?? 'desc';
        $deleted = $options['deleted']  ?? null;

        $users = $this->_model->where(function ($q) use ($keyword) {
            $q->where('name', 'like', "%$keyword%")
                ->orWhere('email', 'like', "%$keyword%");
        })->orderBy($sortBy, $sort);

        $users = $users->paginate($pageSize, ['*'], 'page', $page);

        $users = $users->toArray();

        unset($users['links']);

        return $users;
    }
}