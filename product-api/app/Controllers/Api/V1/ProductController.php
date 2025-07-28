<?php

namespace App\Controllers\Api\V1;

use App\Models\Product;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class ProductController extends ResourceController
{
    use ResponseTrait;

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $model = new Product();
        $data = $model->findAll();

        if (!$data) {
            return $this->failNotFound('No product data is found.');
        }

        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $model = new Product();
        $data = $model->find($id);

        if (!$data) return $this->failNotFound("No data product is found");

        return $this->respond($data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $json = $this->request->getJson();

        $data = [
            'name' => $json->name,
            'description' => $json->description,
            'price' => $json->price,
        ];

        $model = new Product();

        if (!$model->save($data)) return $this->fail('Product data not created', 400);
        return $this->respondCreated($data);
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
