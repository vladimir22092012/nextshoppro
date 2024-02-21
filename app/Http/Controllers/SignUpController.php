<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUp\SignUpRequest;
use App\Models\AspCode;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SignUpController extends Controller
{

    public function form() {
        return Inertia::render('Site/SignUp');
    }

    public function sign_up(SignUpRequest $request)
    {
        $data = $request->validated();
        $data['role_id'] = Role::query()->where('role', '=', Role::ROLE_USER)->first()->id;

        $user = User::create($data);
        if ($user) {
            //TODO: сделать отправку на email
            $code = AspCode::generate(6);
            AspCode::create([
                'code' => $code,
                'type' => AspCode::TYPE_EMAIL_VERIFICATION,
                'verifyable_type' => User::class,
                'verifyable_id' => $user->id,
            ]);
        }

    }

    public function verify( $request)
    {
        dd($request->toArray());
    }
}
