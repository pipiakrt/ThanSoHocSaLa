<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report as Model;
use App\Models\Newsletter;

class ReportController extends Controller
{
    public function index() {
        return view('lien-he');
    }

    public function newsletter(Request $request) {
        try {
            Newsletter::create($request->all());
        } catch (\Throwable $th) {
            return redirect('/');
        }
        return redirect('/');
    }

    public function create(Request $request)
    {
        try {
            Model::create($request->all());
        } catch (\Throwable $th) {
            return redirect('/');
        }
        return redirect()->back()->with('success', 'Cảm ơn bạn đã gửi phản hồi đến chúng tôi.');
    }
}
