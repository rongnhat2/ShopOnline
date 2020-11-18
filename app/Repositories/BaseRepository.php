<?php

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface
{
    /**
     * model property on class instances
     */
    protected $model;

    /**
     * Constructor to bind model to repo
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all instances of model
     */
    public function getAll(array $condition = null, $sort = 'id')
    {
        if (!empty($condition)) {
            return $this->model->when(!empty($condition), function ($q) use ($condition) {
                return $q->where($condition);
            })->orderByDesc($sort)->get();
        }
        return $this->model->all()->sortByDesc($sort);
    }

    /**
     * Count all instances of model
     */
    public function countAll(array $condition = null)
    {
        return $this->model->when(!empty($condition), function ($q) use ($condition) {
            return $q->where($condition);
        })->count();
    }

    /**
     * create a new record in the database
     */
    public function create(array $data)
    {
        $data['created_at'] = Carbon::now();
        return $this->model->create($data);
    }


    /**
     * create a new record in the database
     */
    public function insert(array $data)
    {
        $data['created_at'] = Carbon::now();
        return $this->model->insert($data);
    }


    /**
     * update record in the database
     */
    public function update(array $data, $id = null)
    {
        $record = $this->find($id);
        $data['updated_at'] = Carbon::now();
        return $record->update($data);
    }

    /**
     * update record in the database
     */
    public function updateCondition(array $data, array $condition = [])
    {
        $data['updated_at'] = Carbon::now();
        return $this->model->where($condition)->update($data);
    }

    /**
     * update record in the database
     */
    public function increment(array $condition, $column, $num)
    {
        return $this->model->where($condition)->increment($column, $num);
    }

    /**
     * update record in the database
     */
    public function decrement(array $condition, $column, $num)
    {
        return $this->model->where($condition)->decrement($column, $num);
    }

    /**
     * remove record from the database
     */
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * show the record with the given id
     */
    public function find($id, array $field = null)
    {
        if (!empty($field)) {
            return $this->model->find($id, $field);
        }
        return $this->model->findOrFail($id);
    }

    /**
     * Get the associated model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the associated model
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Eager load database relationships
     */
    public function with($relations)
    {
        return $this->model->with($relations);
    }

    /**
     * update or create a new record in the database
     */
    public function updateOrCreate(array $data, array $condition = null)
    {
        return $this->model->updateOrCreate($condition, $data);
    }

    /**
     * The pluck method retrieves all of the values for a given key
     */
    public function pluck($value, $key, $condition = null)
    {
        return $this->model
            ->when(!empty($condition), function ($q) use ($condition) {
                return $q->where($condition);
            })
            ->pluck($value, $key);
    }

    /**
     *  Get all instances of model with paginate
     */
    public function paginated($limit = null, $condition = null, $sort = null, $direction = null)
    {
        return $this->model
            ->when(!empty($condition), function ($q) use ($condition) {
                return $q->where($condition);
            })
            ->when(!empty($sort), function ($query) use ($sort, $direction) {
                return $query->orderBy($sort, $direction);
            }) // sort
            ->paginate($limit);
    }

}
