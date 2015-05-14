<?php
namespace Tev\Repoman\Repositories\Eloquent;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tev\Repoman\Repositories\RepositoryInterface;
use Tev\Repoman\Exceptions\EntityNotFoundException;
use Tev\Repoman\Exceptions\EntityCreateException;
use Tev\Repoman\Exceptions\EntityUpdateException;
use Tev\Repoman\Exceptions\EntityDeleteException;

/**
 * Basic repository, backed by Eloquent.
 */
abstract class Repository implements RepositoryInterface
{
    /**
     * Eloquent backer.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * {@inheritdoc}
     */
    public function chunk($size, $callback)
    {
        $this->model->chunk($size, $callback);
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        try {
            return $this->model->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new EntityNotFoundException("Could not find entity with ID $id");
        }
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        $instance = $this->model->create($data);

        if (!$instance->getKey()) {
            throw new EntityCreateException('Failed to create entity');
        }

        return $instance;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $instance = $this->find($id);

        if (!$instance->update($data)) {
            throw new EntityUpdateException("Failed to update entity with ID $id");
        }

        return $instance;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $instance = $this->find($id);

        if (!$instance->delete()) {
            throw new EntityDeleteException("Failed to delete entity with ID $id");
        }
    }
}
