<?php

namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    public function createMany(array $arrayAttributes);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * Get model.
     * @return string
     */
    public function getModel();

    public function originalModel();

    public function getFirstBy($key, $value, array $with = []);

    public function getLastBy($key, $value, $latest = null, array $with = []);

    public function getManyBy($key, $value, array $with = []);

    public function getManyInArray($key, $array, array $with = [], array $scopes = [], $withTrashed = false);

    public function make(array $with = []);

    public function findOrFail($id);

    public function getFirstOrFailBy($key, $value, array $with = []);

    public function getManyWithTrashedBy($key, $value, array $with = []);

    public function updateOrCreate($data, $optional = []);
}
