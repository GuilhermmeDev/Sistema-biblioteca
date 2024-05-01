<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;

class LoansController extends Controller
{
    public function panel() {
        $loans = Loan::where('status', '!=', 'devolvido')->get();

        return view('admin.panel', ['loans' => $loans]);
    }

    public function check($loan_id) {
        $loan = Loan::findOrFail($loan_id)->update(['status' => 'devolvido']);

        return redirect()->back()->with('success', 'Livro marcado como Devolvido com sucesso!');
    }
}
