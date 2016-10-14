<?php

namespace Statamic\Addons\LargeCollection\Lib;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Statamic\Data\Entries\EntryCollection;

/**
 * Class PaginatableEntryCollection
 *
 * @package \Statamic\addons\LargeCollection\Lib
 */
class PaginatableEntryCollection extends EntryCollection
{
    public function paginate($perPage = null, $pageName = 'page', $page = null)
    {
        $total = count($this->items);

        $page = $page ?: Paginator::resolveCurrentPage($pageName);

        $offset = ($page-1) * $perPage;
        $slice = array_slice($this->items, $offset, $perPage);

        return new LengthAwarePaginator($slice, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => $pageName,
        ]);
    }
}
