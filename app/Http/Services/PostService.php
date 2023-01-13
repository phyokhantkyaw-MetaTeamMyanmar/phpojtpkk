<?php

namespace App\Http\Services;

use App\Contracts\Services\postInterface;
use App\Http\Dao\PostDao;

class PostService implements postInterface
{
    private $PostDao;
    public function __construct(PostDao $postDao)
    {
        $this->PostDao = $postDao;
    }
    public function create($request)
    {
        return $this->PostDao->create($request);
    }
    public function search($request)
    {
        return $this->PostDao->search($request);
    }
    public function edit($id)
    {
        return $this->PostDao->edit($id);
    }
    public function update($id,  $request)
    {
        return $this->PostDao->update($id, $request);
    }
    public function delete($id)
    {
        return $this->PostDao->delete($id);
    }
    public function profile($id)
    {
        return $this->PostDao->profile($id);
    }
    public function updateProfile($id, $request)
    {
        return $this->PostDao->updateProfile($id, $request);
    }
}
