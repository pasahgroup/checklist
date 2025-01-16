<?php

// public function getDatabaseName()
// {
//     // Apply your condition and return databse
//     if(url('/') === 'http://localhost:8000'){
//         return 'conn1';
//     } else {
//         return 'conn2';
//     }
// }


public function query()
{
    $outstandings = sale::query()->join('customers','sales.customer_id','customers.id')
                ->leftjoin('customer_wallets','customer_wallets.customer_id','customers.id')
                ->select('sales.*','customers.customer_name','customer_wallets.balance as wallet_balance')
                ->where(function ($query) {
                    $query->where('sales.status', 'Credit')
                          ->orwhere('sales.status', 'Installment'); });
    return $outstandings;
}
