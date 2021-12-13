<?php

namespace App\Console\Commands;

use App\Models\Customer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerBirthdayWishMail;

class WishCustomerOnBirthday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wish:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command send an email to customers on their birthday.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $customers =  Customer::whereMonth('date_of_birth', today()->format('m'))
            ->whereDay('date_of_birth', today()->format('d'))
            ->get(['name', 'email', 'id']);

        foreach ($customers as $customer) {
            Mail::to($customer->email)->send(new CustomerBirthdayWishMail($customer));
        }
    }
}
