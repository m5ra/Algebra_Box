<?php

namespace App\Http\Controllers\Admin;

use Sentinel;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
  /**
   * Set middleware to quard controller.
   *
   * @return void
   */
    public function __construct()
    {
        // da li je korisnik logiran ili nije
        $this->middleware('sentinel.auth');
        // ako je korisnik logiran provjeri ima li rolu administrator
        $this->middleware('sentinel.role:administrator');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.dashboard');
    }
}
