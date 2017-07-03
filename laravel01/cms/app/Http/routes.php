<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Books;
use Illuminate\Http\Request;

/**
* 本のダッシュボード表示 */
Route::get('/', function () {
    $books = Books::orderBy('created_at', 'asc')->get();
    return view('books', [
        'books' => $books
    ]);
});
/**
* 新「本」を追加 */
Route::post('/books ', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'item_name' => 'required|min:3|max:255',
        'item_number' => 'required|min:1|max:3',
        'item_amount' => 'required|max:6',
        'published' => 'required',
    ]);
    if ($validator->fails()) {
        return redirect('/')
        ->withInput()
        ->withErrors($validator);
    }
    $books = new Books;
    $books->item_name = $request->item_name;
    $books->item_number = $request->item_number;
    $books->item_amount = $request->item_amount;
    $books->published = $request->published;
    $books->save(); //「/」ルートにリダイレクト
    return redirect('/');
});
/**
* 本を削除 */
Route::delete('/book/{book}', function (Books $book) {
    $book->delete();
    return redirect('/');
});