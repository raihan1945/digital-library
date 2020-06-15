<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Input;
use DB;
use Image;
use Carbon\Carbon;
use File;
use App\Book;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web','auth','verified']);
    }
    public function index()
    {
        $current_total_books = Book::whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', Carbon::today()->month)->count();
        $last_total_books_1 = Book::whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', Carbon::today()->subMonth(1))->count();
        $last_total_books_2 = Book::whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', Carbon::today()->subMonth(2))->count();
        $last_total_books_3 = Book::whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', Carbon::today()->subMonth(3))->count();
        $last_total_books_4 = Book::whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', Carbon::today()->subMonth(4))->count();
        $last_total_books_5 = Book::whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', Carbon::today()->subMonth(5))->count();
        $last_total_books_6 = Book::whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', Carbon::today()->subMonth(6))->count();
        $last_total_books_7 = Book::whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', Carbon::today()->subMonth(7))->count();
        $last_total_books_8 = Book::whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', Carbon::today()->subMonth(8))->count();
        $last_total_books_9 = Book::whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', Carbon::today()->subMonth(9))->count();
        $last_total_books_10 = Book::whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', Carbon::today()->subMonth(10))->count();
        $last_total_books_11 = Book::whereYear('created_at', Carbon::today()->year)->whereMonth('created_at', Carbon::today()->subMonth(11))->count();
        $users = User::select('status',DB::raw('count(status) as count'))->groupBy('status')->get();
        $all_users=User::all()->count();
        $all_books=Book::all()->count();
        return view('admin.dashboard')->with('users',$users)->with('all_users' ,$all_users)->with('all_books',$all_books)->with(compact('current_total_books','last_total_books_1','last_total_books_2','last_total_books_3','last_total_books_4','last_total_books_5','last_total_books_6','last_total_books_7','last_total_books_8','last_total_books_9','last_total_books_10','last_total_books_11'));
    }
    public function addbooks()
    {
        return view('admin.addbooks');
    }
    public function storebooks(Request $request)
    {
        $book = new Book;
        $this->validate($request,[
            'title'=>'required|string|max:255|min:6',
            'synopsis'=>'required|string|min:25',
            'author'=>'required|string|max:255|min:6',
            'content'=>'required|mimes:pdf',
            'cover'=>'required|image|mimes:jpeg,png,jpg',
        ]);
        if($request->file('content'))
        {
            $contentupload = $request->file('content');
            $contentname = time().'.'.$contentupload->getClientOriginalExtension();
            $request->file('content')->move('book/', $contentname);
            $book->content = $contentname;  
        }
        $coverupload = request()->file('cover');
        $covername= time().'.'.$coverupload->getClientOriginalExtension();
        $coverpath = public_path('/book/cover/'. $covername);
        
        Image::make($coverupload)->resize(400,400)->save(public_path('/book/cover/'.$covername));
        
        $book->cover = $covername;
        
        $book->title = $request->input('title');
        $book->synopsis = $request->input('synopsis');
        $book->author = $request->input('author');
        $book->save();
        return redirect('admin/showbooks');
    }
    public function updatebook(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required|string|max:255|min:6',
            'synopsis'=>'required|string|min:25|max:400',
            'author'=>'required|string|max:255|min:6',
            'content'=>'required|mimes:pdf',
            'cover'=>'required|image|mimes:jpeg,png,jpg',
        ]);
        $book=Book::find($id);
            if ($request->hasFile('cover','content')) {
                $cover=$request->file('cover');
                $content=$request->file('content');
                $filename=time().'.'.$cover->getClientOriginalExtension();
                $contentname=time().'.'.$content->getClientOriginalExtension();
                $file=public_path('/book/cover/'. $book->cover);
                $contentfile=public_path('/book/'.$book->content);
                if(File::exists($file,$contentfile))
                {
                    unlink($file);
                    unlink($contentfile);
                }
                Image::make($cover)->resize(300,300)->save(public_path('book/cover/'. $filename));
                $request->file('content')->move('book/', $contentname);
                $book->cover = $filename;
                $book->content = $contentname ;
                $book->title = $request->input('title');
                $book->synopsis = $request->input('synopsis');
                $book->author = $request->input('author');
                $book->update();
                return redirect('admin/showbooks')->with('status','The book is successfully added');
            }
    }
    public function showbooks()
    {
        $data=Book::all();
        return view('admin.showbooks', ['data'=>$data]);
    }
    public function editbook(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        return view('admin.editbook')->with('book',$book);
    }
    public function deletebook($id)
    {
        $book=Book::findOrFail($id);
        $coverpath = public_path('/book/cover/'.$book->cover);
        $contentpath = public_path('/book/'.$book->content);
        if(File::exists($coverpath,$contentpath))
        {
            File::delete($coverpath);
            File::delete($contentpath);
        }
        $book->delete();

        return redirect('admin/showbooks')->with('status', 'Your Data is Deleted');
    }
    public function showlibrarians()
    {
        $data=User::all();
        return view('admin.showlibrarians', ['data'=>$data]);
    }
    public function editlibrarian(Request $request, $id)
    {
        $users=User::findOrFail($id);
        return view('admin.editlibrarian')->with('users',$users);
    }
    public function profile(Request $request, $id)
    {
        $users=User::find($id);
        return view('admin.profile')->with('users',$users);
    }
    public function updatelibrarian(Request $request, $id)
    {
            $this->validate($request,[
                'name'=>'required|string|max:255|min:7',
                'email'=>'required|string|email|max:255',
                'role_id'=>'required|int',
                'avatar'=>'required|image|mimes:jpeg,png,jpg',
            ]);
            $users=User::find($id);
            if ($request->hasFile('avatar')) {
                $avatar=$request->file('avatar');
                $filename=time().'.'.$avatar->getClientOriginalExtension();
                if($users->avatar!=='default.jpg')
                {
                    $file=public_path('/picture/profile/'. $users->avatar);
                    if(File::exists($file))
                    {
                        unlink($file);
                    }
                }
                Image::make($avatar)->resize(300,300)->save(public_path('/picture/profile/'. $filename));
                $users->avatar = $filename;
            $users->name = $request->input('name');
            $users->email = $request->input('email');
            $users->role_id = $request->input('role_id');
            $users->update();
            return redirect('admin/showlibrarians')->with('status','The Data is Updated');
            }
    }
    public function deletelibrarian($id)
    {
        $users=User::findOrFail($id);
        if($users->avatar!=='default.jpg')
        {
            $profilepath = public_path('/picture/profile/'.$users->avatar);
            if(File::exists($profilepath))
            {
                File::delete($profilepath);
            }
        }
        $users->delete();

        return redirect('admin/showlibrarians')->with('status', 'Your Data is Deleted');
    }
}
