<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends BaseController
{
    public function __construct()
    {
        parent::__construct(Request::class);
    }

    protected $model = Tag::class;
    protected $resource = 'tags';

}
