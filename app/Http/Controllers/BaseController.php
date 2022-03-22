<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class BaseController extends Controller {
	public function index() {
		return view('backend/layout/apresentacao');
	}
}
