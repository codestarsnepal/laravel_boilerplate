<?php

namespace App\Repositories;

class OrganizationRepository extends EloquentRepository
{
    public function getModel()
    {
        return \App\Models\Organization::class;
    }
}
