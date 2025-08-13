<?php

namespace App\Http\Controllers;
use App\Models\Faqs;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function showFAQs(){
        return view('admin_dashboard.FAQs.faqs');
    }

    public function showFAQslist(){
        $faqs = Faqs::all();
        return view('admin_dashboard.FAQs.faqs_list', compact('faqs')); // Pass the FAQs to the view
    }


    public function storeFAQs(Request $request){
    $request -> validate([
        'question' => 'required',
        'answer' => 'required',
    ]);
    Faqs::create([
        'question' => $request->question,
        'answer' => $request->answer,
    ]);
    return redirect()->route('faq-list')->with('success', 'FAQs Added');
}

public function DeleteFaq($id){
    Faqs::destroy($id);
    return redirect()->route('faq-list')->with('success', 'FAQs Deleted');
}

// public function UpdateForm(){
//     return view('admin_dashboard.FAQs.update_faq');
// }
public function edit($id)
{
    $faq = Faqs::findOrFail($id);

    return view('admin_dashboard.FAQs.update_faq', compact('faq'));
}

public function UpdateFaq(Request $request, $id){
    $faq = Faqs::findOrFail($id);

    $request->validate([
        'question' => 'required|string|max:255',
        'answer' => 'required|string',
    ]);

    $faq->update([
        'question' => $request->question,
        'answer' => $request->answer,
    ]);

    return redirect()->route('faq-list')->with('success', 'FAQ updated successfully.');
}
}

