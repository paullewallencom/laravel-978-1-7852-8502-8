<?php

namespace MyCompany\Commands;

use MyCompany\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;

class ReserveRoomCommand extends Command implements SelfHandling
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
