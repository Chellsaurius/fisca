<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    //
    public function index() {
        $payments = Pago::all();

        return view('payments.lPayments', compact('payments'));
    }

    public function newPayment($rfc) {

    }
}
