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

        $group_lvl_1 = null;
        $group_lvl_2 = null;
        $group_lvl_3 = null;

        $group_id = $request->group_id;
        $group_info = Group::where('id',$group_id)->first();

        if($group_info->parent_id == null){
            $group_lvl_1 = $group_info->title;
        }else{
            $parent_group_id = $group_info->parent_id;
            $parent_group_info = Group::where('id',$parent_group_id)->first();
            if($parent_group_info->parent_id == null){
                $group_lvl_1 = $parent_group_info->title;
                $group_lvl_2 = $group_info->title;
            }else{
                $grand_parent_group_id = $parent_group_info->parent_id;
                $grand_parent_group_info = Group::where('id',$grand_parent_group_id)->first();
                $group_lvl_1 = $grand_parent_group_info->title;
                $group_lvl_2 = $parent_group_info->title;
                $group_lvl_3 = $group_info->title;
            }
        }
        $account = Account::create($validatedData + ['group_1' => $group_lvl_1, 'group_2' => $group_lvl_2, 'group_3' => $group_lvl_3]);
        
        return redirect(route('accounts.index'))->with('message', 'Account has created successfully!');

    }

}
