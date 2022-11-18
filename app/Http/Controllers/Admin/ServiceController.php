<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    protected $services;

    /**
     * @param $services
     */
    public function __construct(Service $services)
    {
        $this->services = $services;
    }

    public function index()
    {
        return view('admin-services', ['services' => $this->services->all()]);
    }

}
