<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Bank;
use App\Models\Branch;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bank_accounts']=BankAccount::all();
        // dd($data['bank_accounts']);
      return view('pre_configuration.bank-account.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['banks']=Bank::all();
        $data['branches']=Branch::all();
        return view('pre_configuration.bank-account.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         BankAccount::create($request->all());
        return redirect()->route('bank_accounts.index')->with('success','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function show(BankAccount $bankAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['banks']=Bank::all();
        $data['branches']=Branch::all();
        $data['bank_account']=BankAccount::find($id);
        return view('pre_configuration.bank-account.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bank_account =BankAccount::find($id);
      $bank_account->account_name=$request->account_name;
      $bank_account->account_no=$request->account_no;
      $bank_account->branch_id=$request->branch_id;
      $bank_account->branch_code=$request->branch_code;
      $bank_account->bank_id=$request->bank_id;
      $bank_account->opening_balance=$request->opening_balance;
      $bank_account->save();
       return redirect()->route('bank_accounts.index')->with('info','Data Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BankAccount::find($id)->delete();
           return redirect()->route('bank_accounts.index')->with('error','Data Delete Successfully');
    }
}
