<?php

namespace Statamic\Addons\LargeCollection;

use Statamic\Addons\LargeCollection\Lib\PaginatableEntryCollection;
use Statamic\API\Entry;
use Statamic\Extend\Addon;

class LargeCollection extends Addon
{

    /**
     * Get the list of articles
     *
     * @return array
     */
    public function getArticles()
    {
        $collection = "article";

        /** @var PaginatableEntryCollection $articles */
        $articles = PaginatableEntryCollection::make( Entry::whereCollection($collection)->sort() )->paginate(25);

        return $articles;
    }

    /**
     * Get the list of results
     *
     * @return array
     */
    public function getResults($query)
    {
        $collection = "article";
        $query = strtolower($query);

        /** @var PaginatableEntryCollection $articles */
        $articles = PaginatableEntryCollection::make( Entry::whereCollection($collection)
            ->filter(function ($entry) use ($query) {
                return str_contains(strtolower($entry->get('title')), $query) || str_contains(strtolower($entry->get('body')), $query);
            })
        )->paginate(25)->appends(compact('query'));

        return $articles;
    }


}
