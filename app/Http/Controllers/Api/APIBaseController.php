<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BaseController;
use Dingo\Api\Http\Request;

class APIBaseController extends BaseController implements APIInterface
{
    protected $repository;

    protected $transformer;

    /*
     * Get list of resource
     *
     * @param Request $request
     *
     * @return Resource Collection
     */
    public function index(Request $request)
    {
        try {
            $modelObj = app($this->repository->model());
            $total = $modelObj->count();

            if ($term = $request->get('search')['value']) {
                $this->repository->filter($term, $request->get('columns'));
                $total = $this->repository->count();
            }

            $result = $this->repository->paginateResult(
                $request->get('start'), $request->get('length')
            );

            $data = [];

            foreach ($result as $item) {
                $data[] = $this->transformer->transform($item);
            }

            return [
                'draw'            => $request->get('draw'),
                'recordsTotal'    => $total,
                'recordsFiltered' => $total,
                'data'            => $data,
            ];
        } catch (\Exception $e) {
            return ['error' => 'There is an error'];
        }
    }
}
