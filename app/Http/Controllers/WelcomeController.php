<?php
namespace ERPsat\Http\Controllers;

use ERPsat\User;
use Datatable;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}

	public function datatables()
	{
		if(Datatable::shouldHandle())
		{
			return Datatable::collection(User::all(array('id','nombre')))
				->showColumns('id', 'nombre')
				->searchColumns('nombre')
				->orderColumns('id','nombre')
				->make();
		}

		return view('datatables');
	}


}
