<?php
     
namespace App\Http\Traits;
 
use App\Models\User;
 
trait GlobalTrait {
 
    public function getAllSettings() 
    {
        // Fetch all the settings from the 'settings' table.
        $settings = User::all();
        return $settings;
    }
}