<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends BaseController
{
    public function __construct()
    {
        parent::__construct(Request::class);
    }

    protected $model = Contact::class;
    protected $resource = 'contacts';

}
