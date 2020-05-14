<?php

namespace App\Traits;

use App\Criterias\SearchTerm;
use Illuminate\Support\Arr;

trait DatatableTrait
{
    public function filter($term, $columns = [])
    {
        $fields = Arr::pluck(Arr::where($columns, function ($value) {
            return filter_var($value['searchable'], FILTER_VALIDATE_BOOLEAN);
        }), 'data');

        $this->pushCriteria(new SearchTerm($term, $fields));
    }

    public function paginateResult($offset = 0, $limit = 10)
    {
        $this->applyCriteria();

        $results = $this->model->offset($offset)->limit($limit);

        return $results->get();
    }
}
