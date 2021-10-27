<?php

namespace App\Http\Request\Pagination;

use Illuminate\Http\Request;

class PaginationOptions
{
    const DEFAULT_PER_PAGE = 25;
    const MAX_PER_PAGE = 1000;

    /**
     * @var string
     */
    protected $page;

    /**
     * @var string
     */
    protected $perPage;

    /**
     * PaginationOptions constructor.
     * @param string|null $page
     * @param string|null $perPage
     */
    public function __construct($page = null, $perPage = null)
    {
        $this->page = (int)($page ?: 1);
        $this->perPage = (int)(!is_null($perPage) ? $perPage : self::DEFAULT_PER_PAGE);
    }

    /**
     * @return string
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @return string
     */
    public function getPerPage()
    {
        return $this->perPage >= self::MAX_PER_PAGE ? self::DEFAULT_PER_PAGE : $this->perPage;
    }

    /**
     * @param Request $request
     * @return PaginationOptions
     */
    public static function fromRequest(Request $request)
    {
        return new self(
            $request->input('page'),
            $request->input('perPage')
        );
    }
}
