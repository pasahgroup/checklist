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

  $view->with('userCount', Auth::user());
  //dd($view->userCount);

             if($view->userCount !=NULL)
             {
               $property_id=Auth::user()->property_id;
             }
             else {
               $property_id=0;
             }

            $view->with('user', Auth::user());
            $view->with('userx', User::all());
            $view->with('qnsCountx', User::join('properties','users.property_id','properties.id')
            ->select('properties.property_name')->first());

            $view->with('qnsCount', answer::where('answer','!=','Yes')
            ->where('manager_checklist','!=','Cleared')
            ->where('property_id',$property_id)
             ->where('status','Active')
            ->get());
            //dd($view->qnsCount);
            
  
            //->select('properties.property_name')->first());
             //$view->with('qnsCount', collect($qnsCount));

             $view->with('company', myCompany::where('status','Active')->first());
        });
    }
}
