<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    //管理画面表示
    public function index(Request $request)
    {
        $contacts = Contact::with('category')->paginate(7);
        return view('admin', compact('contacts'));
    }
    
    //削除
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json(['success' => true]);
    }

    // 検索
    public function search(Request $request)
    {
        $query = Contact::query();

        // 絞り込み（名前、性別、カテゴリなど）
        if ($request->filled('text')) {
            $query->where('first_name', 'like', '%'.$request->text.'%')
                ->orWhere('last_name', 'like', '%'.$request->text.'%')
                ->orWhere('email', 'like', '%'.$request->text.'%');
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender === 'men' ? 1 : ($request->gender === 'women' ? 2 : 3));
        }

        if ($request->filled('content')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('content', $request->content);
            });
        }

        if ($request->filled('day')) {
            $query->whereDate('created_at', $request->day);
        }

        $contacts = $query->paginate(10);

        return view('admin', compact('contacts'));
    }
        

}
