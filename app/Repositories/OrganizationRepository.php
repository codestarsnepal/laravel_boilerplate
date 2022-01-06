<?php

namespace App\Repositories;

class OrganizationRepository extends EloquentRepository implements OrganizationRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Organization::class;
    }
}
