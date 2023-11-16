<?php

namespace App\Http\Controllers\Admin;

use App\Models\DirectEmployee;
use Illuminate\Support\Facades\Request;

class DirectEmployeeController extends BaseController
{
    public function __construct()
    {
        parent::__construct(Request::class);
    }

    protected $model = DirectEmployee::class;
    protected $resource = 'direct-employees';


}
