<?php

namespace App\Http\Livewire;

 use App\Models\orderItem;
 use App\Models\asset;

use App\Models\metadata;
use App\Models\metanameDatatype;
use App\Models\property;

use App\Models\metaname;
use Livewire\Component;
use Illuminate\Http\Request;

class AssetLivewire extends Component
{
   public $departments = "";
	   public $post;
      public $message = "";
      public $pos_id = [];
      public $metaname_id;
       public $site_id;
   public $names=[];
  public $properties;

    // public $metaname_name;

      public function storeItem(request $request, $id)
    {

   $id=$this->metaname_id;
        $metaname = metaname::where('id',$id)->first();

//dd($metaname->metaname_name);

        if(metaname::where('metaname_name',$metaname->metaname_name)->exists()){
            $message = "Sorry! this item already exist";
            $this->message = $message;
        //  dd($id);

 $newitemorder = asset::create([
                'asset_name'=>$id,
                'asset_serial_no'=>$id,
                'asset_barcode'=>0.00,
                'asset_tag_no'=>'tag_no',
                'user_id'=>auth()->id()
                ]);
        }
        else{
            $newitemorder = asset::create([
                'asset_name'=>$id,
                'asset_serial_no'=>$id,
                'asset_barcode'=>0.00,
                'asset_tag_no'=>'tag_no',
                'user_id'=>auth()->id()
                ]);

            $message = "succes!,Record updated successfuly";
            $this->message = $message;
        }
    }




   public function storeProperty(request $request, $id)
    {
 // $id=$this->metaname_id;
  $v=$this->names;
 //dd($v);

 $newitemorder = asset::create([
 	            'metaname_id'=>1,
                'asset_name'=>$name,
                'asset_serial_no'=>$id,
                'asset_barcode'=>0.00,
                'asset_tag_no'=>'tag_no',
                'user_id'=>auth()->id()
                ]);
    }


   public function store(Request $request)
    {
          $hear_from = request('names');
         //dd($hear_from);
     $g='asset_serial';

//dd(request('property_id'));

  $tourhearfrom = asset::UpdateOrCreate(
      [
    'property_id'=>request('site_id'),
      	'metaname_id'=>request('metaname_id'),
     'asset_name'=>request('asset_name')],

      [
                'asset_location'=>request('asset_location'),
                'asset_brand'=>request('asset_brand'),
                'asset_version'=>request('asset_version'),

                 'asset_type'=>request('asset_type'),
               'asset_serial_no'=>request('asset_serial'),
                'asset_barcode'=>request('asset_barcode'),
                'asset_tag_no'=>request('asset_tag'),
                'asset_description'=>request('asset_description'),
                'user_id'=>auth()->id()
        ]);


   return redirect()->back()->with('success','Asset created successfly');
    }

  public function groupMetaNameFilter(request $request, $id)
    {

  $metadatas = metadata::get();
    }



    public function render()
    {
      //dd('dd');
   $pos_id=$this->metaname_id;

                $sites = property::get();
                 $metanames = metaname::get();
            $metadatas = metanameDatatype::where('metaname_id',$this->metaname_id)->get();
            //dd($metadatas);
      return view('livewire.asset-livewire',compact('metadatas','metanames','sites'))
      ->layout('layouts.app');

  }
}
