<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Product;
use Illuminate\Support\Facades\Auth;



class CommentsController extends Controller
{

    public function addComment(Request $request,$product_id)
    {
        $objcomment = new Comment();
        $objcomment->comment = $request->message;
        $objcomment->name = Auth::user()->name;
        $objcomment->status = 0;
       $product = Product::find($product_id);
       $product->comments()->save($objcomment);
       return redirect()->back();
    }
    public function xls()
    {


        require '../vendor/autoload.php';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');

        $writer = new Xlsx($spreadsheet);
        $writer->save('hello world.xlsx');
    }
    public function confirm_comment($id)
    {
        $comment = Comment::where('id',$id)->get();

        $comment[0]->status = 1 ;
        $comment[0]->save();
        return redirect()->back()->with([
            'message'    => __('generic.comment_confirm_success')."",
            'alert-type' => 'success',
        ]);
    }

}
