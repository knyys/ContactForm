<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;  
use App\Models\Contact;
use App\Models\Category;


class ContactController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->session()->get('contact_data', []);
        $categories = Category::all();
        return view('index', compact('data','categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $validated = $request->validated();

        $tel = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');

        $data = $validated;
        $data['tel'] = $tel;
        $data['category_id'] = $request->input('category_id');

        $request->session()->put('contact_data', $data);
        
        return redirect('/confirm');
    }

    public function confirmForm(Request $request)
    {
        
        $data = $request->session()->get('contact_data');
        if (!$data) {
            return redirect('/')->with('error', 'セッションが切れました。再度入力してください。');
        }

        $category = Category::find($data['category_id']);
    $data['category_name'] = $category ? $category->content : '未選択';
        return view('confirm', compact('data'));
    }

    public function send(Request $request)
    {
        $data = $request->session()->get('contact_data');
        if (!$data) {
            return redirect('/')->with('error', 'セッションが切れました。再度入力してください。');
        }

        Contact::create($data);

        $request->session()->forget('contact_data');

        return redirect('/thanks')->with('success', 'お問い合わせ内容を送信しました。');
    }
    public function thanks()
    {
        return view('thanks');
    }
          
}
