<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use App\User;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index()
    {
        $books = Book::latest('id')->limit(6)->get();
        return view('librarian.dashboard')->with('books',$books);
    }
    public function search(Request $request)
    {
        if($request->has('search'))
        {
            $book = Book::where('title','like','%'.$request->search.'%')->orwhere('author','like','%'.$request->search.'%')->paginate(6);
        }else
        {
            $book = Book::all();
        }
        return view('librarian.search',['book' => $book]);
    }
    public function listbooks()
    {
        $book =  Book::all();
        return view('librarian.listbook')->with('book',$book);
    }
    public function bookdetails(Request $request, $id)
    {
        $books = Book::findOrFail($id);
        return view('librarian.bookdetail')->with('books',$books);
    }
    public function profile(Request $request, $id)
    {
        $users=User::find($id);
        return view('librarian.profile')->with('users',$users);
    }
    public function editprofile(Request $request,$id)
    {
        $users=User::findOrFail($id);
        return view('librarian.editprofile')->with('users',$users);
    }
    public function updateprofile(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|string|max:255|min:7',
            'email'=>'required|string|email|max:255',
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
            $users->update();
            return redirect('librarian/profile')->with('status','The Data is Updated');
            }
    }
}
