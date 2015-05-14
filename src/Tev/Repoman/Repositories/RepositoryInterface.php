<?php
namespace Tev\Repoman\Repositories;

/**
 * Basic repository interface.
 *
 * Provides common repository methods.
 */
interface RepositoryInterface
{
    /**
     * Fetch all entities in the repository.
     *
     * @return mixed
     */
    public function getAll();

    /**
     * Fetch all entities from the repository, in chunks of $size. Useful for
     * reducing memory footprint.
     *
     * @param  int      $size     Chunk size
     * @param  \Closure $callback Callback function. Accepts resultset as sole param
     * @return void
     */
    public function chunk($size, $callback);

    /**
     * Find a single entity in the repository, by ID.
     *
     * @param  mixed $id ID
     * @return mixed
     *
     * @throws \Tev\Repoman\Exceptions\EntityNotFoundException If entity could not be found
     */
    public function find($id);

    /**
     * Create a new entity with the given data.
     *
     * @param  array $data Key value pairs
     * @return mixed
     *
     * @throws \Tev\Repoman\Exceptions\EntityCreateException If entity creation failed
     */
    public function create(array $data);

    /**
     * Update an entity with the given data.
     *
     * @param  mixed  $id   ID
     * @param  array  $data Key value pairs
     * @return mixed
     *
     * @throws \Tev\Repoman\Exceptions\EntityNotFoundException If entity could not be found
     * @throws \Tev\Repoman\Exceptions\EntityUpdateException   If entity updating failed
     */
    public function update($id, array $data);

    /**
     * Delete an entity.
     *
     * @param  mixed $id ID
     * @return mixed
     *
     * @throws \Tev\Repoman\Exceptions\EntityNotFoundException If entity could not be found
     * @throws \Tev\Repoman\Exceptions\EntityDeleteException   If entity deletion failed
     */
    public function delete($id);
}
