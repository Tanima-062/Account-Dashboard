<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Nevadskiy\Tree\AsTree;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;

class Group extends Model
{
    use HasFactory;
    use AsTree;

    protected $appends = ['parents', 'children'];

    public function getParentsAttribute()
    {
        $collection = collect([]);
        $parent = $this->parent;
        while($parent) {
            $collection->push($parent);
            $parent = $parent->parent;
        }
    
        return $collection;
    }

    public function getChildrenAttribute()
    {
        $collection = collect([]);
        $child = Group::where('parent_id', $this->id)->first();
        while($child) {
            $collection->push($child);
            $child = Group::where('parent_id', $child->id)->first();
        }

        return $collection;
    }

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }

    public function getTotalDebitAttribute() 
    {
        return $this->accounts->sum('debit');
    }

    public function getTotalCreditAttribute() 
    {
        return $this->accounts->sum('credit');
    }

    public function getTotalAmountAttribute() 
    {
        return $this->total_debit + $this->total_credit;
    }
}
