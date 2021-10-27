<?php

namespace App\Api\PhoneBook\Repositories;

use App\Api\PhoneBook\Models\PhoneBook;
use App\Exceptions\NotFoundException;
use App\Http\Request\Pagination\PaginationOptions;
use Illuminate\Support\Arr;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PhoneBookRepository
{
    /**
     * @var string
     */
    protected $model = PhoneBook::class;

    /**
     * @param $id
     * @throws NotFoundException
     */
    public function delete(int $id)
    {
        $phoneBook = $this->model::where('id', $id)->first();

        if (!$phoneBook) {
            throw new NotFoundException();
        }

        $phoneBook->delete();
    }

    /**
     * @param int $id
     * @return mixed
     * @throws NotFoundException
     */
    public function get(int $id)
    {
        $phoneBook = $this->model::where('id', $id)->first();

        if (!$phoneBook) {
            throw new NotFoundException();
        }

        return $phoneBook;
    }

    /**
     * @param PaginationOptions $options
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all(PaginationOptions $options)
    {
        return QueryBuilder::for($this->model)
            ->allowedSorts('last_name', 'first_name', 'id', 'created_at', 'country_code', 'timezone')
            ->allowedFilters([AllowedFilter::scope('name')])
            ->paginate($options->getPerPage());
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->model::create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     * @throws NotFoundException
     */
    public function update($id, $data)
    {
        $phoneBook = $this->model::where('id', $id)->first();

        if (!$phoneBook) {
            throw new NotFoundException();
        }

        $phoneBook->update($data);

        return $phoneBook;
    }
}
