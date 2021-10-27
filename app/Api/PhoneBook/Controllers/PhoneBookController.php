<?php

namespace App\Api\PhoneBook\Controllers;

use App\Api\PhoneBook\Repositories\PhoneBookRepository;
use App\Api\PhoneBook\Resources\PhoneBookResource;
use App\Http\Controllers\Controller;
use App\Http\Request\Pagination\PaginationOptions;
use App\Http\Response\Response;
use Illuminate\Http\Request;

class PhoneBookController extends Controller
{
    /**
     * @var PhoneBookRepository
     */
    protected $phoneBookRepository;

    /**
     * PhoneBookController constructor.
     * @param PhoneBookRepository $phoneBookRepository
     */
    public function __construct(PhoneBookRepository $phoneBookRepository)
    {
        $this->phoneBookRepository = $phoneBookRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function all(Request $request)
    {
        $paginationOptions = PaginationOptions::fromRequest(request());
        $result = PhoneBookResource::collection($this->phoneBookRepository->all($paginationOptions));

        return response()->json($result);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\NotFoundException
     */
    public function get($id)
    {
        $result = $this->phoneBookRepository->get($id);

        return response()->json($result);
    }

    public function delete(int $id)
    {
        $this->phoneBookRepository->delete($id);
    }

    public function update()
    {

    }

    public function create()
    {

    }
}
