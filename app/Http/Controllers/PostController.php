<?php

namespace App\Http\Controllers;

use App\Http\Requests\InputValidation;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Generator\Method;
use PhpParser\Node\Expr\New_;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\isEmpty;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {

            $userid = Auth::user('id')->admin_status;
            $pending = Auth::user('id')->pending;

            // return $pending;
            // return $userid;

            // $new = User::find($userid)->where('');
            // $user_Key = $new[0]->admin_status;
            // return $userid;
            // $user_Key = $new[0]->user_id;
            //     //
            //     $posts = User::with('getpost');
            //     return view('user.showall', ['posts' => $posts]);
            //     // return view('user.dash', ['posts' => $posts]);
            if ($pending == 1) {
                return redirect('/pending');
            } elseif ($pending == 0) {
                if ($userid == 1) {
                    $allposts = Post::select('*')->get();
                    // $allposts = Post::simplePaginate(10);
                    $allUsers = User::select('*')->get();
                    $admins = User::where('admin_status', '=', '1')->get();
                    $pending = User::where('pending', '=', '1')->get();

                    return view('admin.dash', ['allposts' => $allposts, 'allUsers' => $allUsers, 'admins' => $admins, 'pending' => $pending]);
                }
            }
        }
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Auth::user()) {
            $userid = Auth::user('id')->admin_status;
            // $user_id = User::select('id')->where('id', $id);
            $userid = Auth::user();
            $pending = Auth::user('id')->pending;

            if ($pending == 1) {
                return redirect('/pending');
            } elseif ($pending == 0) {
                // $new = User::find($userid)->first()->getPosts;
                // $user_Key = $new[0]->user_id;
                return view('user.newpost');
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InputValidation $request)
    {

        // if ((!($_SERVER['REQUEST_METHOD'] == 'post'))) {
        //     return 'errors.404';
        // }
        // if (validator()->fails()) {
        //     return validator()->errors()->first();
        // }
        $file_ext =  $request->file->getClientOriginalExtension();
        $file_name = time() . '.' . $file_ext;
        $path = './images';
        $request->file->move($path, $file_name);
        if (Auth::user()) {

            $request->validated();
            $userid = Auth::user('id')->admin_status;
            $pending = Auth::user('id')->pending;

            if ($pending == 1) {
                return redirect('/pending');
            } elseif ($pending == 0) {

                if ($userid == 1) {

                    $userid = Auth::user()->id;
                    // if (!(Post::where('user_id', $userid)->get())) {
                    //     $new = User::find($userid)->getPosts[0]->user_id;
                    //     return             $new;
                    $new = Post::where('user_id', $userid)->get();
                       $user_Key = Auth::user('id')->id;

                    $post = new Post;
                    $post->user_id = $user_Key;
                    $post->name = $request->name;
                    $post->description = $request->description;
                    $post->tag = $request->tag;
                    $post->category = $request->category;
                    $post->file =  $file_name;
                    $post->save();
                    return redirect('/home')->with($request->session()->flash('success', 'Done'));
                } elseif ($userid == 0) {
                    $userid = Auth::user()->id;
                    if (!(Post::where('user_id', $userid)->get())) {
                        $new = User::find($userid)->getPosts[0]->user_id;
                        return             $new;
                    } else {
                        $post = new Post;
                        $post->user_id = $userid;
                        $post->name = $request->name;
                        $post->description = $request->description;
                        $post->tag = $request->tag;
                        $post->category = $request->category;
                        $post->file =  $file_name;
                        $post->save();
                        return redirect('/show')->with($request->session()->flash('success', 'Done'));
                    }
                    // :   return    $new ? return redirect('user.newpost');

                    // return            $user_Key = $new[0][1]->user_id;


                }
            }
        } else {
            return redirect('/');
        }
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
            $pending = Auth::user('id')->pending;

            if ($pending == 1) {
                return redirect('/pending');
            } elseif ($pending == 0) {

                if ($userid == 1) {

                    $user = Auth::user()->id;
                    // $new = User::find($user)->first()->getPosts;
                    // $new =  DB::table('posts')->where('user_id', $user)->get();
                    $new = Post::select('*')->where('user_id', $user)->get();

                    return view('user.dash', ['posts' =>  $new]);
                } elseif ($userid == 0) {
                    $user = Auth::user('id')->id;
                    // return $user;
                    // $new = Post::Paginate(10);
                    $new = Post::select('*')->where('user_id', $user)->get();
                    // $new =  DB::table('posts')->where('user_id', $user) ;

                    return view('user.dash', ['posts' =>  $new]);
                }
            }
        }
        return redirect('login');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showPost($postid)
    {
        if (Auth::user()) {
            $userid = Auth::user('id')->admin_status;
            $pending = Auth::user('id')->pending;

            if ($pending == 1) {
                return redirect('/pending');
            } elseif ($pending == 0) {
                Auth::user();
                $new =  Post::findorfail($postid);
                return view('user.showpost', ['post' =>  $new]);
            }
        } else {
            return redirect('login');
        }
    }


    public function edit($postid)
    {
        //
        if (Auth::user()) {
            $userid = Auth::user('id')->admin_status;
            $pending = Auth::user('id')->pending;

            if ($pending == 1) {
                return redirect('/pending');
            } elseif ($pending == 0) {
                $post = Post::findorfail($postid);
                return view('user.editpost', ['post' => $post]);
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InputValidation $request, $id)
    {

        $request->validated();
        if (Auth::user()) {
            $userid = Auth::user('id')->admin_status;
            // $id =  Auth::user()->id;
            $pending = Auth::user('id')->pending;

            if ($pending == 1) {
                return redirect('/pending');
            } elseif ($pending == 0) {
                if ($userid == 1) {

                    $userid = Auth::user();
                    if (empty($request->file)) {
                        $old_file = Post::select('file')->where('id', $id)->get()[0]->file;
                        $post = Post::where('id', $id);
                        $post->update([
                            'name' => $request->name,
                            'description' => $request->description,
                            'tag' => $request->tag,
                            'category' => $request->category,
                            'file' => $old_file,

                        ]);
                        return redirect('/home')->with($request->session()->flash('success', 'Done'));
                    }


                    $file_ext =  $request->file->getClientOriginalExtension();
                    $file_name = time() . '.' . $file_ext;
                    $path = './images';
                    $request->file->move($path, $file_name);

                    $post = Post::where('id', $id);
                    $post->update([
                        'name' => $request->name,
                        'description' => $request->description,
                        'tag' => $request->tag,
                        'category' => $request->category,
                        'file' => $file_name,

                    ]);
                    return redirect('/home')->with($request->session()->flash('success', 'Done'));
                } elseif ($userid == 0) {


                    Auth::user()->id;
                    if (empty($request->file)) {
                        $old_file = Post::select('file')->where('id', $id)->get()[0]->file;
                        $post = Post::where('id', $id);
                        $post->update([
                            'name' => $request->name,
                            'description' => $request->description,
                            'tag' => $request->tag,
                            'category' => $request->category,
                            'file' => $old_file,

                        ]);
                        return redirect('/home')->with($request->session()->flash('success', 'Done'));
                    }
                    Auth::user()->id;

                    $file_ext =  $request->file->getClientOriginalExtension();
                    $file_name = time() . '.' . $file_ext;
                    $path = './images';
                    $request->file->move($path, $file_name);

                    $post = Post::where('id', $id);
                    $post->update([
                        'name' => $request->name,
                        'description' => $request->description,
                        'tag' => $request->tag,
                        'category' => $request->category,
                        'file' => $file_name,

                    ]);
                }
                return redirect('/home')->with($request->session()->flash('success', 'Done'));
            };
            // return redirect('/show')->with($request->session()->flash('success', 'Done'));
        }
        // }

        // return redirect('login');
    }
    // $post->name = $request->name;
    // $post->description = $request->description;
    // $post->tag = $request->tag;
    // $post->category = $request->category;
    // $post->save();
    // return redirect('/show');


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

                    $userid = Auth::user();
                    $post = Post::where('id', $id);
                    $post->delete();
                    return redirect('/home')->with(['success' => 'Done']);
                } else {
                    $post = Post::where('id', $id);
                    $post->delete();
                    return redirect('/show')->with(['success' => 'Done']);
                }
            }
        } else {
            return redirect('login');
        }
    }
}