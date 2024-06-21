<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use Illuminate\Support\Facades\DB;

class LoansController extends Controller
{
    public function panel() {

        $request = request('view');

        if ($request == 'history') {
            $loans = Loan::all();
        }
        else {
            $loans = Loan::where('status', '!=', 'devolvido')->get();
        }

        return view('admin.panel', ['loans' => $loans]);
    }

    public function check($loan_id) {
        $loan = Loan::findOrFail($loan_id)->update(['status' => 'devolvido']);

        $addBook = DB::table('loans')->join('books', 'loans.book_id', '=', 'books.id')
        ->update(['books.num_exemplares' => DB::raw('books.num_exemplares + 1')]);

        return redirect()->back()->with('success', 'Livro marcado como Devolvido com sucesso!');
    }
}
