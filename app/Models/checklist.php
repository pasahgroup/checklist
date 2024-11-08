<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class checklist extends Model
{
    use HasFactory;
    public static function getAsset($n){
      // $value=DB::table('assets')->select('id','property_id','metaname_id','asset_name')->where('metaname_id', $n)->get();
    //     $value = DB::table('assets')
    //             join('answers','answers.asset_id','assets.id')
    //  ->where('assets.metaname_id',$n)
    //  ->where('answers.manager_checklist','!=',"Cleared")
    //  ->groupby('assets.asset_name')
    // ->select('assets.id','assets.asset_name')
    //   ->get();
//dd($value);


      // $value = DB::select('select p.id,p.asset_name,p.property_id,p.metaname_id from answers d,assets p where d.property_id=p.property_id and d.metaname_id=p.metaname_id and d.asset_id=p.id and p.metaname_id="'.$n.'" and d.status="Active" and d.manager_checklist!="Cleared" group by p.asset_name');



  $value = DB::select('select id,asset_name from assets where property_id ="'.auth()->user()->property_id.'" and metaname_id="'.$n.'" and status="Active"');
//dd($value);
      return $value;
    }



        public static function getAssetManager($n){
      // $value = DB::select('select p.id,p.asset_name,p.property_id,p.metaname_id from dutymanagers d,assets p where d.property_id=p.property_id and d.metaname_id=p.metaname_id and d.asset_id=p.id and p.metaname_id="'.$n.'" and d.status="Active" and d.manager_checklist!="Cleared" group by p.asset_name');

            $value = DB::select('select id,asset_name from assets where property_id ="'.auth()->user()->property_id.'" and metaname_id="'.$n.'" and status="Active"');

      return $value;
    }
}
