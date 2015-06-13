<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use App\Follow;
use App\Repost;
use Auth;
use Request;

class UsersController extends Controller {

	/**public function __construct(){
		$this->middleware('auth',['only'=>'show']);
	}
	*/
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		if (Auth::guest())
		{
			$users = User::all();
			return view('users.index', compact('users'));
		}
		else
		{
			$reposts= Repost::where('user_id',Auth::user()->getId())->get();
			$users = User::all();
			$user = User::find(Auth::user()->getId());
			$follows=Follow::where('userfolow_id',Auth::user()->getId())->get();
			return view('users.show', compact('user','follows','users','reposts'));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		$users = User::all();
		$reposts= Repost::where('user_id',$id)->get();
		$follows=Follow::where('userfolow_id',$id)->get();
		return view('users.show', compact('user','follows','users','reposts'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
