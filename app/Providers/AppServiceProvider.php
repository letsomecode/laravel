<?php

namespace App\Providers;

use App\Hashing\Sha1Hasher;
use App\Mail\FakeMailTransport;
use App\Mail\GmailMailTransport;
use App\Mail\MailTransport;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind(Sha1Hasher::class, function () {
//            return new Sha1Hasher('0123');
//        });
//
//        $this->app->instance(Sha1Hasher::class, new Sha1Hasher('0123'));
        $this->app->when(Sha1Hasher::class)->needs('$salt')->give('012345');
        $this->app->bind(MailTransport::class, FakeMailTransport::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
