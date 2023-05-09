<?php

namespace App\Interfaces;

interface ProductInterface
{
    public function getAll();

    public function find($id);

    public function create($data);

}
