<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use App\Models\Category;

use App\Http\Requests\TestRequest;


class TestController extends Controller
{
    public function index(TestRequest $request)
    {
        $validatedData = $request->validated(); 
        $categories = Category::all();
        return view('index', compact('categories','validatedData'));
    }

    public function confirm(Request $request)
    {
        $contact = $request->all();
        session()->put('contact', $contact);
        $contact['tel'] = $request->tel1 . $request->tel2 . $request->tel3;
        $category = Category::find($contact['detail']);
        session()->put('contact', $contact);
        return view('confirm', compact('contact', 'category'));
    }


    public function admin()
    {
        $contact = Contact::Paginate(7);
        return view('admin', compact('contact'));

    }


    public function search(Request $request)
    {
        $query = Contact::query();

    if ($request->filled('text')) {
        $query->where('name', 'like', '%' . $request->text . '%');
    }
    if ($request->filled('gender')) {
        $query->where('gender', $request->gender);
    }
    if ($request->filled('detail')) {
        $query->where('detail', $request->kind);
    }
    if ($request->filled('day')) {
        $query->whereDate('created_at', $request->day);
    }
    $contacts = $query->get();
    return view('admin.search', compact('contacts'));
    }
    
    public function destroy(Request $request)
    {
    Contact::find($request->id)->delete();
    return redirect('/admin');
    }



    public function login()
    {

        return view('login');
    }

    public function authenticate()
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/admin');
        }
    }

    public function registerForm()
    {
        return view('register'); 
    }

    public function register(TestRequest $request)
    {
        $user = $request->all();
        User::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => Hash::make($user['password']),
        ]);
        return redirect('/login');
    }


    public function thanks()
    {
        $contactData = session('contact');
        Contact::create([
        'first_name' => $contactData['first_name'],
        'last_name' => $contactData['last_name'],
        'gender' => $contactData['gender'],
        'email' => $contactData['email'],
        'tel' => $contactData['tel'],
        'address' => $contactData['address'],
        'building' => $contactData['building'],
        'detail' => $contactData['detail'],
        'content' => $contactData['content'],
    ]);
        return view('thanks');
    }
    

}
