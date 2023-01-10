<?php

namespace App\Contracts\Dao;

interface postDaoInterface
{
    public function create($bullet);
    public function search($request);
    public function edit($id);
    public function delete($id);
    public function update($id,$request);
    public function profile($id);
}