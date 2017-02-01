<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as Repository;

abstract class BaseRepository extends Repository
{
    /**
     * Set the "limit" value of the query.
     *
     * @param  int $value
     * @param  array $columns
     * @return $this
     */
    public function limit($value, $columns = ['*'])
    {
        $this->applyCriteria();
        $model = $this->model->limit($value)->get($columns);
        $this->resetModel();

        return $this->parserResult($model);
    }

    /**
     * Add a basic where clause to the query.
     *
     * @param  string|\Closure  $column
     * @param  string  $operator
     * @param  mixed   $value
     * @param  string  $boolean
     * @return $this
     */
    public function where($column, $operator = null, $value = null, $boolean = 'and')
    {
        $this->model = $this->model->where($column, $operator, $value, $boolean);

        return $this;
    }

    /**
     * Add an "order by" clause for a timestamp to the query.
     *
     * @param  string  $column
     * @return $this
     */
    public function latest($column = 'created_at')
    {
        $this->model = $this->model->latest($column);

        return $this;
    }
}