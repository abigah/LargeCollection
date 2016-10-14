<?php

namespace Statamic\Addons\LargeCollection;

use Statamic\API\Nav;
use Statamic\Extend\Listener;

class LargeCollectionListener extends Listener
{
    /** @var  $large_collection LargeCollection */
    private $large_collection;

    public $events = [
        'cp.nav.created' => 'addNavItems'
    ];

    public function init()
    {
        $this->large_collection = new LargeCollection();
    }

    public function addNavItems($nav)
    {
        // Create the first level navigation item
        // Note: by using route('store'), it assumes you've set up a route named 'store'.
        $largeCollections = Nav::item('Large Collections')->route('large_collection')->icon('infinity');

        // Finally, add our first level navigation item
        // to the navigation under the 'tools' section.
        $nav->addTo('content', $largeCollections);
    }
}
