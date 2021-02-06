<?php

namespace App\Services;

use App\Hashing\Hasher;
use App\Hashing\Sha1Hasher;
use App\Mail\Mailer;
use App\User;
use Illuminate\Container\Container;
use Illuminate\Http\Request as IlluminateRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Request;

class UserService
{
    /**
     * @var Hasher
     */
    private $hasher;
    /**
     * @var Mailer
     */
    private $mailer;

    public function __construct(Sha1Hasher $hasher, Mailer $mailer)
    {
        $this->hasher = $hasher;
        $this->mailer = $mailer;
    }

    public function register()
    {
        // Tao user
        $user = new User();
        // hash password
//        $user->password = $this->hasher->make(Request::get('password'));

        $request = \Illuminate\Http\Request::createFrom(app('request'));
        $request->query->set('email', 'alice@example.com');
//        Container::getInstance()->instance('request', $request);

        $email = Request::get('email');
        dd($email);

        $user->email = $request->get('email');
        $user->name = 'Let Some Code';

//        $request = $app['request'];
        $email = $request->get('email');

        dd($email);

//        Request::get('email');
        dd($email);

//        $mailer = new Mailer(IS_TESTING ? new FakeMailTransport() : new GmailMailTransport());
        $this->mailer->send($user->email, 'user.register', ['user' => $user]);

        dump($user);
        // Gui email cho user
    }

    public function login()
    {
        $hasher = new Sha1Hasher('0123');
    }

    /**
     * @return Hasher
     */
    public function getHasher(): Hasher
    {
        return $this->hasher;
    }

    /**
     * @param Hasher $hasher
     * @return UserService
     */
    public function setHasher(Hasher $hasher): UserService
    {
        $this->hasher = $hasher;
        return $this;
    }

    /**
     * @return Mailer
     */
    public function getMailer(): Mailer
    {
        return $this->mailer;
    }

    /**
     * @param Mailer $mailer
     * @return UserService
     */
    public function setMailer(Mailer $mailer): UserService
    {
        $this->mailer = $mailer;
        return $this;
    }
}
