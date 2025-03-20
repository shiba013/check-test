<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Contact;
use App\Models\Category;


class UserController extends Controller
{
    public function index() {
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts','categories'));
    }

    public function search(Request $request) {
        if ($request->has('reset')) {
            return redirect('/admin')->withInput();
        }
        $contacts = Contact::with('category')
        ->CategorySearch($request->category_id)
        ->GenderSearch($request->gender)
        ->KeywordSearch($request->keyword)
        ->DateSearch($request->created_at)
        ->paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts','categories'));
    }

    public function destroy(Request $request)
    {
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'tell',
            'address',
            'building',
            'category_id',
            'detail',
        ]);
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }

    public function export(Request $request)
    {
        return response()->streamDownload(
            function() {
                $query = Contact::get();
                $csvData = $query;
                $csvHeader = [
                    'id','category_id','first_name','last_name','gender','tell','email','address','building','detail','created_at','updated_at',
                ];
                $createCsvFile = fopen('php://output', 'w');
                dd($csvHeader);
                mb_convert_variables('SJIS-win', 'UTF-8', $csvHeader);
                fputcsv($createCsvFile, $csvHeader);

                foreach ($csvData as $csv) {
                    $csv['created_at'] = Data::make($csv['created_at'])->setTimezone('Asia/Tokyo')
                    ->format('Y/m/d H:i:s');

                    $csv['updated_at'] = Data::make($csv['created_at'])->setTimezone('Asia/Tokyo')
                    ->format('Y/m/d H:i:s');

                    mb_convert_variables('SJIS-win', 'UTF-8', $csv);
                    fputcsv($createCsvFile, $csv);
                };
                fclose($createCsvFile);
            },
            'contact.csv',
            ['Content-Type' => 'application/octet-stream',]
        );
    }
}