<?php

namespace App\Http\Controllers\Web\Account;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Group;

class AccountController extends Controller
{

    /**
     *
     * @return void
     */
    public function index(Request $request)
    {
        // $data=Account::where('group_id',1)->first();
        // dd($data->group->children[0]->title);
        $accounts = Account::query()
                    ->paginate(request('per_page', 10))
                    ->withQueryString();
    
        return Inertia::render('Accounts/Index', ['accounts' => $accounts]);
    }

    public function create()
    {
        $groups = Group::select('id','title')->get();
        return Inertia::render('Accounts/Create', [
            'groups' => $groups,
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title'        =>  'required|unique:accounts',
            'group_id'     =>  'required',
            'debit'        =>  'required',
            'credit'       =>  'required',
        ], [
            'group_id.required' => 'Group field is required.',
        ]);

       
        $account = Account::create($validatedData);
        
        return redirect(route('accounts.index'))->with('message', 'Account has created successfully!');

    }

    public function report(){
        $groups = Group::with('accounts')
            ->whereNull('paret_id')->get();
        $groups->sum('total_amount');
        return Inertia::render('Accounts/Report', ['groups' => $groups]);
    }

}
