<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
  public function index()
    {
        return view('index');
    }
    
  public function formRegister()
  {
    return view('register');
  }

  public function register(Request $request)
  {
    $inputRequest = $request->input();
    $validator = Validator::make($inputRequest, [
        'email'     => 'unique:users,email|required|string',
        'name'      => 'required|string',
        'password'  => 'required|string',
    ]);

    if ($validator->fails()) {
      $error                = $validator;
      $response['status']   = false;
      $response['message']  = $error;
    }

    $userRepo   = new UserRepository();
    $response   = $userRepo->createAndLogin($inputRequest);
    $statusCode = $response['code'];
    unset($response['code']);

    
    return redirect()->route('formLogin')
    ->with('success','Register successfully.');
  }

  public function formLogin()
  {
    return view('login');
  }

  public function login(Request $request)
  {
    $input_request = $request->input();
    $validator = Validator::make($input_request, [
        'email'     => 'required|exists:users,email',
        'password'  => 'required',
    ]);

    if ($validator->fails()) {
      $error = $validator;
      $response['status'] = false;
      $response['message'] = $error;
      return redirect()->route('formRegister');
    }

    $data = [
        'email'     => $input_request['email'],
        'password'  => $input_request['password']
    ];

    if (auth()->attempt($data)) {
      $user       = Auth::user();
      $objToken   = auth()->user();
      $strToken   = $objToken->accessToken;
      //$expiration = $objToken->token->expires_at->diffInSeconds(Carbon::now());

      $request->session()->put('email','email');
      return redirect()->route('index')
                        ->with('success','Loggin successfully.');
    } else {
      return redirect()->route('formLogin');
    }
  }

  public function profile(Request $request)
  {
    $user       = Auth::user();
    return response()->json($user, 200);
  }

  public function put(Request $request)
  {
    $user     = Auth::user();
    $input    = $request->all();

    $validator =  Validator::make($input,[
      'name' => 'string|required',
      'email' => 'unique:users,email,'.$user->id.',id|string|required',
      'password' => 'sometimes|required|string'
    ]);

    if ($validator->fails()) {
      $error = $validator;
      $response['status']   = false;
      $response['message']  = $error;
      return response()->json($response, 400);
    }

    $userRepo   = new UserRepository();
    $response   = $userRepo->update($input);

    $statusCode = $response['code'];
    unset($response['code']);

    if($response['status'] === true){
      return response()->json($response, $statusCode);
    }

    return response()->json($response, $statusCode);
  }

  public function patch(Request $request)
  {
    $user     = Auth::user();
    $input    = $request->all();

    $validator =  Validator::make($input,[
      'name' => 'sometimes|string|required',
      'email' => 'sometimes|unique:users,email,'.$user->id.',id|string|required',
      'password' => 'sometimes|required|string'
    ]);

    if ($validator->fails()) {
      $error = $validator;
      $response['status']   = false;
      $response['message']  = $error;
      return response()->json($response, 400);
    }

    $userRepo   = new UserRepository();
    $response   = $userRepo->update($input);

    $statusCode = $response['code'];
    unset($response['code']);

    if($response['status'] === true){
      return response()->json($response, $statusCode);
    }

    return response()->json($response, $statusCode);
  }

  public function delete(Request $request)
  {
    $user     = Auth::user();
    $userRepo   = new UserRepository();
    $response   = $userRepo->delete($user->id);

    $statusCode = $response['code'];
    unset($response['code']);

    if($response['status'] === true){
      return response()->json($response, $statusCode);
    }

    return response()->json($response, $statusCode);
  }

  public function logout(Request $request)
  {
    //$request->user()->token()->revoke();
    $request->session()->forget('email');
    return redirect()->route('formLogin');
  }
}