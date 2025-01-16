<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\answer;
use App\Models\myCompany;
use App\Models\dbsetting;
use App\Models\dbconnect;

use Illuminate\Support\Facades\DB;

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
  //$aData['dataC'] = dbsetting::getConnect(Auth::user()->id);
   //$view->with('user_qnsCountxx', dbconnect::where('user_id',$$view->user->id))->first();


             if($view->user !=NULL)
             {
              //dd('not null');
               $property_id=$view->user->property_id;
               $company_id=$view->user->company_id;

               $valueDB=DB::table('dbconnects')->where('user_id',Auth::user()->id)->first();

                 //$aData['dataC'] = dbsetting::getConnect(Auth::user()->id);
                 //$view->with('user_qnsCountxx', dbconnect::where('user_id',$$view->user->id))->first();
    //dd($view->user);

                //DB::purge('mysql');
                   Config::set('database.connections.mysql.host',$valueDB->host);
                 Config::set('database.connections.mysql.database',$valueDB->db_name);
                 Config::set('database.connections.mysql.username',$valueDB->db_username);
                 Config::set('database.connections.mysql.password',$valueDB->pwd);
                 DB::reconnect('mysql');

             }
             else {
              // dd('null');
               $property_id=1;
               $company_id=1;
             }
            // dd($company_id);

            //$view->with('user', Auth::user());
            // $view->with('userx', User::all());


             $view->with('userx', User::get());
            $view->with('qnsCountx', User::join('properties','users.property_id','properties.id')
            ->select('properties.property_name')->first());

            $view->with('qnsCount', answer::where('answer','!=','Yes')
            ->where('manager_checklist','!=','Cleared')
            ->where('property_id',$property_id)
             ->where('status','Active')
            ->get());
            //  dd($view->user);
            //dd($company_id);

            //->select('properties.property_name')->first());
             //$view->with('qnsCount', collect($qnsCount));

             $view->with('company', myCompany::where('id',$company_id)->where('status','Active')->first());
        });
    }
}
