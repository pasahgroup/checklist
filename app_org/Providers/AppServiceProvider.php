<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\answer;
use App\Models\myCompany;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    
    public function register()
    {
        //dd('register');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      $userCount=0;
       Paginator::useBootstrap();

         // Using view composer to set following variables globally
           view()->composer('*',function($view) {

  // $view->with('userCount', Auth::user());
  $view->with('user', Auth::user());
  //dd($view->user);

             if($view->user !=NULL)
             {
              //dd('not null');
               $property_id=$view->user->property_id;
               $company_id=$view->user->company_id;
             }
             else {
              // dd('null');
               $property_id=1;
               $company_id=1;
             }
             //dd($company_id);

            //$view->with('user', Auth::user());
            // $view->with('userx', User::all());
            //dd($view->user);


             $view->with('userx', User::on('clientdb')->get());
            
            $view->with('qnsCountx', User::on('clientdb')->join('properties','users.property_id','properties.id')
            ->select('properties.property_name')->first());

            $view->with('qnsCount', answer::on('clientdb')->where('answer','!=','Yes')
            ->where('manager_checklist','!=','Cleared')
            ->where('property_id',$property_id)
             ->where('status','Active')
            ->get());
            //dd($company_id);
              
            //->select('properties.property_name')->first());
             //$view->with('qnsCount', collect($qnsCount));

             $view->with('company', myCompany::where('id',$company_id)->where('status','Active')->first());
    
        });
    }
}
