<?php

namespace Statamic\Addons\LargeCollection;

use Illuminate\Http\Request;
use Statamic\API\Entry;
use Statamic\Extend\Controller;

class LargeCollectionController extends Controller
{
	/** @var  $large_collection LargeCollection */
    private $large_collection;

    public function init()
    {
        $this->large_collection = new LargeCollection();
    }



    /**
     * Maps to your route definition in routes.yaml
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {

        return $this->view('index', ['articles' => $this->large_collection->getArticles()]);
    }

    /**
     * Maps to your route definition in routes.yaml
     *
     * @return Illuminate\Http\Response
     */
    public function results(Request $request)
    {

        return $this->view('index', ['articles' => $this->large_collection->getResults($request['query'])]);
    }
}
