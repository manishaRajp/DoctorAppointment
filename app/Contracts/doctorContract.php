<?php

namespace App\Contracts;

interface doctorContract
{
   public function store(array $request);
   public function update(array $request);
}
