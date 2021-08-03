<?php

namespace App\Http\Controllers\apis;
use App\Models\UsersModel;
use App\Models\User;
use App\Models\Chat;
use App\Models\notify;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Validation\input;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UserController;


class UsersController extends Controller
{

    public function userByid($id)
    {

        $users = DB::table('users')->where('id', $id)->get();

        $date['status'] = 200;
        $date['data'] = $users;
        $date['message'] = "تم جلب الباينات بنجاح";

        return response()->json($date, 200);
    }

   public function users()
    {

//        $users = DB::table('users')->first();
        $users = DB::table('users')->get();

        $date['status'] = 200;
        $date['data'] = $users;
        $date['message'] = "تم جلب الباينات بنجاح";

        return response()->json($date, 200);
    }

    public function login(Request $request)
    {
        $username = $request->email;
        $password = $request->password;

        $email = $request->email;
        $user = User::where(function ($query) use ($username) {
            $query->Where('email', $username);
        })->first();

        if (!empty($user)) {
            if (Auth::attempt(['id' => $user->id, 'password' => $password])) {
                $user = Auth::user();
                $success['data'] = $user;
                $success['status'] = true;
                return response()->json($success, 200);
            } else {
                $success['status'] = false;
                $success['data'] = null;

                $success['message'] = 'user email or password is wrongsssssssssssssss';
                return response()->json($success, 200);
            }
        } else {
            $success['status'] = false;
            $success['data'] = null;

            $success['message'] = 'user is wrong';
            return response()->json($success, 200);
        }


    }

    public function register(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',

        ]);

        if ($validator->fails()) {
            $responseArr['message_errors'] = $validator->errors();;
            $responseArr['token'] = '';
            return response()->json($responseArr, 201);
        }

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->name = $request->name;
//        $user->user_name = $request->user_name;
        $user->group_id = 2;
        $user->area_id = $request->area;
        $user->lat = $request->lat;
        $user->long = $request->long;
        $user->address = $request->address;
        $user->remember_token =$this->generateRandomString(15);

        $user->save();

        $to = $user->email;

        $subject = 'شكرا لتسجيلك معنا';
        $message = " تم انشاء حسابك بنجاح ". "\r\n" .
            " برجاء الضغط على الرابط التالي لتفعيل حسابك الشخصي". "\r\n" .

            "<a href='".url('/en/verify_account',$user->id)."'>". url('/verify_account',$user->id)  ."</a>"   ;
        $headers = 'Content-type: text/html; charset=UTF-8;dir:rtl' . "\r\n" .
            "From: noreplay@makkah-medical.com";

        mail($to, $subject, $message, $headers);


        $success['status'] = true;
        $success['data'] = $user;

        $success['message'] = 'user is registering';
        return response()->json($success, 200);
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function forgetPassword(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->orWhere('phone', $email)->first();
        if (isset($user) && $user != null) {

            $newpass = rand(1, 999999);
//            $newpass = 123123;
            $user->password = Hash::make($newpass);
            if ($user->save()) {
                $to = $user->email;
                $subject = "كلمة المرور الجديدة - شاري ";
                $txt = " \r\n كلمة المرور الجديدة : " . $newpass
                    . " \r\n يمكن اعادة تعيين كلمة المرور الخاصة بك بعد الدخول على التطبيق واختيار تغيير كلمة المرور ";
                $headers = "From: noreplay@makkah-medical.com";

                mail($to, $subject, $txt, $headers);
            }
            $data["status"] = 200;
            $data["data"] = "";
            $data['message'] = "سيتم ارسال كلمة المرور الجديده الى بريد الالكترونى برجاء ماراجعة البريد الالكترونى الخاص بكم لتتمكن من تسجيل الدخول الى حسابك.";
        } else {
            $data["status"] = -1;
            $data["data"] = "";
            $data['message'] = "البريد الالكترونى الذى ادخلته غير صحيح.";
        }
        return json_encode($data);
    }


    public function changePassword(Request $request)
    {

        $userid = $request->user_id;
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;
        $old_password = $request->old_password;


        if ($new_password == $confirm_password) {
            $user = User::find($userid);
            if (!empty($user)) {
                if (Hash::check($old_password, $user->password)) {
                    $user->password = Hash::make($new_password);
                    $user->save();
                    $success['status'] = 200;
                    $success['data'] = $user;
                    $success['message'] = "تم تغيير كلمة المرور بنجاح";


                    $to = $user->email;

                    $subject = ' تم تعيين كلمة المرور';
                    $message = " تم انشاء كلمة المرور الجديدة بنجاح " . "\r\n";

                    $headers = 'Content-type: text/html; charset=UTF-8;dir:rtl' . "\r\n" .
                        "From: " . "noreplay@log-apps.com";

                    mail($to, $subject, $message, $headers);

                } else {
                    $success['status'] = -1;
                    $success['data'] = null;
                    $success['message'] = "كلمة المرور القديمة غير صحيحة";
                }


            } else {
                $success['status'] = -2;
                $success['data'] = null;
                $success['message'] = "هذا المستخدم غير مسجل لدينا";
            }

        } else {
            $success['status'] = -3;
            $success['data'] = null;
            $success['new_password'] = $new_password;
            $success['confirm_password'] = $confirm_password;
            $success['message'] = "كلمة المرور الجديده غير متطابقة";
        }


        return response()->json($success, 200);

//        return \Response::json($arr);
    }
    public function editUser(Request $request)
    {
        $userId = $request->user_id;
        if (!empty($userId) && $userId != null) {
            $user = User::find($userId);
            if (isset($user) && $user != null) {
                if ((isset($request->name) && $request->name != null) && (isset($request->email) && $request->email != null) && (isset($request->address) && $request->address != null) && (isset($request->phone) && $request->phone != null)) {
                    $emails = User::where('email', $request->email)->where('id', '!=', $user->id)->get();
                    if (isset($emails) && $emails != null && count($emails) > 0) {
                        $data["status"] = -1;
                        $data["data"] = null;
                        $data['message'] = "This Email Is Already Exist Please Choose Another One.";
                    } else {
                        $user->email = $request->email;
                        $user->name = $request->name;
                        $user->address = $request->address;
                        $user->area_id = $request->area;
                        $user->phone = $request->phone;
                        if ($request->hasFile('image')) {
                            if ($request->file('image')->isValid()) {
                                try {
                                    $imageName = "ms" . time() . '.' . $request->image->getClientOriginalExtension();
                                    $request->image->move('files/user_images' , $imageName);
                                    $user->image = $imageName;
                                } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                                }
                            }
                        }


                        if ($user->save()) {
                            $data["status"] = 200;
                            $data["data"] = $user;
                            $data['message'] = "User Data Updated Successfully.";
                        }
                    }
                } else {
                    $data["status"] = -1;
                    $data["data"] = [
                        'name' => $request->name,
                        'email' => $request->email,
                        'address' => $request->address,
                        'phone' => $request->phone,
                    ];
                    $data['message'] = "Too Few Arguments.";
                }
            } else {
                $data["status"] = -1;
                $data["data"] = null;
                $data['message'] = "Can't Find User";
            }
        } else {
            $data["status"] = -1;
            $data["data"] = null;
            $data['message'] = "Can't Find User ID";
        }
        return json_encode($data);
    }

}

