<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BooksStoreController extends Controller
{
    public function createBook(Request $request)
    {
        try {
            $book = new Book;
            $book->name = $request->name;
            $book->author = $request->author;
            $book->imageUrl = $request->imageUrl;
            $book->save();
            return response()->json([
                'message' => 'Book is created',
                'book' => $book,
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            echo $e;
            return response()->json([
                'message' => 'Book isn\'t created',
                'book' => $book,
                'status' => 201,
            ]);
        }
    }


    public function getBooks()
    {
        try {
            $books = [];
            $books = DB::table('books')->get();
            return response()->json([
                'message' => 'get all books',
                'books' => $books,
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'don\'t get Book ',
                'books' => $books,
                'status' => 201,
            ]);
        }
    }

    public function updateBook(Request $request)
    {
        try {
            $book = new Book;
            $book->id =$request->id;
            $book->name = $request->name;
            $book->author = $request->author;
            $book->imageUrl = $request->imageUrl;
            $arry = $book->toArray();
            DB::table('books')->where('id', $request->id)->update($arry);
            return response()->json([
                'message' => 'update book',
                'books' => $book,
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            echo $e;
            return response()->json([
                'message' => 'don\'t update Book ',
                'books' => $book,
                'status' => 201,
            ]);
        }
    }

    public function deleteBook(Request $request)
    {
        try {
            DB::table('books')->where('id', $request->id)->delete();
            return response()->json([
                'message' => 'delete book',
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            echo $e;
            return response()->json([
                'message' => 'don\'t delete Book',
                'status' => 201,
            ]);
        }
    }
}
