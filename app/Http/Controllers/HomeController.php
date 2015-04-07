<?php namespace ERPsat\Http\Controllers;

// use Illuminate\Http\Request;

use ERPsat\Http\Requests\CentroRequest;

use ERPsat\Models\CentroRepo;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(CentroRepo $centro)
	{
		$this->centros = $centro;

		$this->middleware('auth');

		parent::__construct();
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}

	public function centros(CentroRequest $request)
	{
		return $this->centros->all();
	}

}
