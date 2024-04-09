<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function company()
    {
        return $this->hasOne(Company::class, 'id');
    }
    // public function companies()
    // {
    //     return company::query()
    //                 ->select('Companies.*')
    //                 ->join('jobs', 'Companies.id', 'jobs.Company_id')
    //                 ->where('Companies.id', '=', 'jobs.company_id')->get();
                    
    // }

    
}
