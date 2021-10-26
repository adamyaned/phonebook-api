<?php

namespace App\Api\PhoneBook\Controllers;

use App\Api\PhoneBook\Repositories\PhoneBookRepository;
use App\Http\Controllers\Controller;

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

    public function all()
    {

    }

    public function get()
    {

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
