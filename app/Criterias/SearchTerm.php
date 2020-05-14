<?php

namespace App\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;

class SearchTerm implements CriteriaInterface
{
    private $term;
    private $fields = [];

    public function __construct($term, $fields)
    {
        $this->term = $term;
        $this->fields = $fields;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (empty($this->fields)) {
            return $model;
        }

        $criteria = $model->where($this->fields[0], 'LIKE', '%' . $this->term . '%');

        array_shift($this->fields);

        foreach ($this->fields as $field) {
            $criteria->orWhere($field, 'LIKE', '%' . $this->term . '%');
        }

        return $criteria;
    }
}
