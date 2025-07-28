<?php

namespace App\Controllers\Api\V1;

use App\Models\Product;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class ProductController extends ResourceController
{
    use ResponseTrait;

    protected Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data = $this->product->findAll();

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
        $data = $this->product->find($id);

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
        $json = json_decode($this->request->getBody());

        $data = [
            'name' => $json->name,
            'description' => $json->description,
            'price' => $json->price,
        ];

        if (!$this->product->save($data)) return $this->fail('Product data not created', 400);
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
        $json = json_decode($this->request->getBody());
        $product = $this->product->find($id);

        $data = [
            "id" => $id,
            "name" => $json->name,
            "description" => $json->description,
            "price" => $json->price,
        ];

        if (!$product) return $this->failNotFound('No data product was found');

        if (!$this->product->save($data)) return $this->fail('Product not updated', 400);

        return $this->respondUpdated($data);
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
        if (!$this->product->find($id)) return $this->failNotFound('Product not found');

        if (!$this->product->delete($id)) return $this->fail("Product not successfully deleted", 400);

        return $this->respondDeleted("Product has been deleted.");
    }
}
