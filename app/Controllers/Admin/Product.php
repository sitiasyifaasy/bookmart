<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Product extends BaseController
{
    public function index()
    {
        return view('admin/product/index');
    }

    //--------------------------------------------------------------------

}
