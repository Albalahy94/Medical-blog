<?php

namespace App\Http\Controllers;

use App\Http\Requests\InputValidation;
use App\Http\Requests\UserValidation;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\Admin;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\BinaryOp\NotIdentical;

class AdminController extends Controller
{
    //
    use AuthenticatesUsers;

    public function __construct()
    {
        // $this->middleware('admin')->except('logout');
    }

    public function adminlogin()
    {
        # code...
        if (Auth::user()) {
            $userid = Auth::user('id')->admin_status;
            $pending = Auth::user('id')->pending;

            if ($pending == 1) {
                return redirect('/pending');
            } elseif ($pending == 0) {

                if ($userid == 1) {
                    return view('admin.adminlogin');
                }
            }
        }
        return redirect('/');
    }
    public function login(UserValidation $req)
    {
        # code...

        // $credentials = $req->only('email', 'password');
        // Auth::attempt($credentials);

        // if (Auth::guard('admin')) {

        //     return redirect()->intended('/admin/dash');
        // }
        // return back()->withInput($req->only('email', 'remember'));



        // Auth::viaRequest('admin', function (Request $request) {
        //     return Admin::where('token', $request->token)->first();
        // });
        // if (Auth::guard('admin')) {

        //     return redirect()->intended('/admin/dash');
        // }
        // return back()->withInput($req->only('email', 'remember'));



        // $email =        Admin::where('email', $req->email)->get('email')[0]->email;
        // $password = Admin::where('password', $req->password)->get('password')[0]->password;
        // // return $email . $password;
        // if (($email == $req->email)) {
        //     if ($password == $req->password) {

        //         return view('admin.dash');
        //     }
        // } else {
        //     return redirect()->back();
        // } 
    }
    public function dash()
    {
        if (Auth::user()) {
            $userid = Auth::user('id')->admin_status;
            $pending = Auth::user('id')->pending;

            if ($pending == 1) {
                return redirect('/pending');
            } elseif ($pending == 0) {

                if ($userid == 1) {
                    return view('admin.dash');
                }
            }
        }
        return redirect('/');
    }


    public function pendingMembers()
    {

        if (Auth::user()) {
            $userid = Auth::user('id')->admin_status;
            // $userid = Auth::guard('admin')->user();
            // return $userid;
            $pending = Auth::user('id')->pending;

            if ($pending == 1) {
                return redirect('/pending');
            } elseif ($pending == 0) {

                if ($userid == 1) {
                    $allUsers = User::select('*')->where('pending', 1)->get();
                    return view('admin/pendingmembers', ['allUsers' => $allUsers]);
                }
                // $new = Admin::find($userid)->first()->getPosts;
                // return view('user.dash', ['posts' =>  $new]);;
            }
        }
        return redirect('/');
    }



    public function pendingEdit($postid)
    {
        //
        if (Auth::user()) {
            $userid = Auth::user('id')->admin_status;
            $pending = Auth::user('id')->pending;

            if ($pending == 1) {
                return redirect('/pending');
            } elseif ($pending == 0) {

                if ($userid == 1) {
                    $allUsers = User::findorfail($postid);

                    return view('admin.editpendingmembers', ['allUsers' => $allUsers]);
                }
            }
        }
        return redirect('/');
    }

    // pendingUpdate


    public function pendingUpdate(Request $request, $id)
    {

        //
        if (Auth::user()) {
            $userid = Auth::user('id')->admin_status;
            // $post = Post::findorfail($id);
            $pending = Auth::user('id')->pending;

            if ($pending == 1) {
                return redirect('/pending');
            } elseif ($pending == 0) {

                if ($userid == 1) {
                    $post = User::where('id', $id);
                    $post->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => bcrypt($request->password),
                        'pending' => $request->pending,
                    ]);
                    // $post->name = $request->name;
                    // $post->description = $request->description;
                    // $post->tag = $request->tag;
                    // $post->category = $request->category;
                    // $post->save();
                    return redirect('/admin/members')->with(['success' => 'Done']);
                }
            }
        }
        return redirect('/');
    }




    public function create()
    {
        if (Auth::user()) {
            $userid = Auth::user('id')->admin_status;
            //
            // $user_id = User::select('id')->where('id', $id);
            // $userid = Auth::user();
            $pending = Auth::user('id')->pending;

            if ($pending == 1) {
                return redirect('/pending');
            } elseif ($pending == 0) {

                if ($userid == 1) {
                    // $new = User::find($userid)->first()->getPosts;
                    // $user_Key = $new[0]->user_id;
                    return view('admin/newmember');
                }
            }
        }
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserValidation $request)
    {
        $request->validated();
        if (Auth::user()) {
            $userid = Auth::user('id')->admin_status;
            $pending = Auth::user('id')->pending;

            if ($pending == 1) {
                return redirect('/pending');
            } elseif ($pending == 0) {

                if ($userid == 1) {

                    $userid = Auth::user();

                    $newUser = new User;
                    $newUser->name = $request->name;
                    $newUser->email  = $request->email;
                    $newUser->password = $request->password;
                    $newUser->save();
                    return redirect('/admin/members')->with(['success' => 'Done']);
                }
            }
        }
        return redirect('/');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (Auth::user()) {
            $userid = Auth::user('id')->admin_status;
            // $userid = Auth::guard('admin')->user();
            // return $userid;
            $pending = Auth::user('id')->pending;

            if ($pending == 1) {
                return redirect('/pending');
            } elseif ($pending == 0) {

                if ($userid == 1) {
                    $allUsers = User::select('*')->get();
                    return view('admin/members', ['allUsers' => $allUsers]);
                }
                // $new = Admin::find($userid)->first()->getPosts;
                // return view('user.dash', ['posts' =>  $new]);;
            }
        }
        return redirect('/');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($postid)
    {
        //
        if (Auth::user()) {
            $userid = Auth::user('id')->admin_status;
            $pending = Auth::user('id')->pending;

            if ($pending == 1) {
                return redirect('/pending');
            } elseif ($pending == 0) {

                if ($userid == 1) {
                    $allUsers = User::findorfail($postid);

                    return view('admin.editmember', ['allUsers' => $allUsers]);
                }
            }
        }
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //
        if (Auth::user()) {
            $userid = Auth::user('id')->admin_status;
            // $post = Post::findorfail($id);
            $pending = Auth::user('id')->pending;

            if ($pending == 1) {
                return redirect('/pending');
            } elseif ($pending == 0) {

                if ($userid == 1) {
                    $post = User::where('id', $id);
                    $post->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => bcrypt($request->password),
                    ]);
                    // $post->name = $request->name;
                    // $post->description = $request->description;
                    // $post->tag = $request->tag;
                    // $post->category = $request->category;
                    // $post->save();
                    return redirect('/admin/members')->with(['success' => 'Done']);
                }
            }
        }
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Auth::user()) {
            $userid = Auth::user('id')->admin_status;
            $pending = Auth::user('id')->pending;

            if ($pending == 1) {
                return redirect('/pending');
            } elseif ($pending == 0) {

                if ($userid == 1) {
                    $user = User::where('id', $id);
                    $user->delete();
                    return back()->with(['success' => 'Done']);
                }
            }
        }
        return redirect('/');
    }
}