<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Repositories;

use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Orion\Travelr\Models\BaseEloquentModel;

abstract class BaseEloquentRepository
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * @var BaseEloquentModel
     */
    protected $model;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->makeModel();
    }

    abstract public function model(): string;

    /**
     * @param int $id
     * @param array $columns
     * @return null|BaseEloquentModel
     * @throws ModelNotFoundException
     */
    public function findById(int $id, array $columns = ['*']): ?BaseEloquentModel
    {
        $result = $this->model->findOrFail($id, $columns);
        $this->reset();

        return $result;
    }

    protected function resetModel(): void
    {
        $this->makeModel();
    }

    protected function makeModel(): void
    {
        $model = $this->container->make($this->model());

        $this->model = $model;
    }

    protected function reset(): void
    {
        $this->resetModel();
    }
}