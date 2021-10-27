<?php

namespace App\Api\PhoneBook\Controllers;

use App\Api\PhoneBook\Repositories\PhoneBookRepository;
use App\Api\PhoneBook\Requests\PostPhoneBookRequest;
use App\Api\PhoneBook\Requests\UpdatePhoneBookRequest;
use App\Api\PhoneBook\Resources\PhoneBookResource;
use App\Http\Controllers\Controller;
use App\Http\Request\Pagination\PaginationOptions;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

        return response()->json(new PhoneBookResource($result));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\NotFoundException
     */
    public function delete(int $id)
    {
        $this->phoneBookRepository->delete($id);

        return response()->json(['status' => 'success']);
    }

    /**
     * @param $id
     * @param UpdatePhoneBookRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\NotFoundException
     */
    public function update($id, UpdatePhoneBookRequest $request)
    {
        $result = $this->phoneBookRepository->update($id, snakeCase($request->validated()));

        return response()->json(new PhoneBookResource($result));
    }

    /**
     * @param PostPhoneBookRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(PostPhoneBookRequest $request)
    {
        $result = $this->phoneBookRepository->create(snakeCase($request->validated()));

        return response()->json(new PhoneBookResource($result), Response::HTTP_CREATED);
    }
}
