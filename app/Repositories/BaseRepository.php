<?php
namespace App\Repositories;

use App\Models\User;
use App\PersonalInformation;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Cache;

class BaseRepository
{
    // public function __construct(User $userModel, PersonalInformation $personalInfoModel)
    // {
    //     $this->userModel = $userModel;
    //     $this->personalInfoModel = $personalInfoModel;
    //     $this->placeholder_image_url = config('enums.fakeProfile');
    //     $this->profileMediaDirectory = config('media.uaa.directory');
    //     $this->enableActiveStatus = config('enums.enableActiveStatus');
    //     $this->pendingActiveStatus = config('enums.pendingActiveStatus');
    //     $this->otpVerified = config('enums.otpVerified');
    //     $this->otpSend = config('enums.otpSend');
    //     $this->disableFirstStatus = config('enums.disableFirstStatus');
    //     $this->enableFirstStatus = config('enums.enableFirstStatus');
    //     $this->otpVerifySuccess = config('enums.otpVerifySuccess');
    //     $this->otpVerifyFail = config('enums.otpVerifyFail');
    //     $this->otpSendSuccess = config('enums.otpSendSuccess');
    //     $this->otpSendFail = config('enums.otpSendFail');
    //     $this->isRegistered = config('enums.isRegistered');

    //     $this->imageField = 'image';
    //     $this->emailField = config('login_types.email');
    //     $this->phoneField = config('login_types.phone');
    //     $this->facebook = config('login_types.facebook');
    //     $this->apple = config('login_types.apple');

    //     $this->emailOrPhoneField = 'emailOrPhone';
    //     $this->passwordField = 'password';
    //     $this->activeStatusField = 'active_status';
    //     $this->loginTypeField = 'loginType';

    //     $this->registeredUser = config('enums.registeredUser');
    //     $this->guest = config('enums.guestUser');
    // }
    // public function checkEmail($email)
    // {
    //     return (Boolean)(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email));
    // }
    // public function storeSocialProfileMedia($mediaUrl)
    // {
    //     return  socialImageUploadToAkoneyaMedia($mediaUrl, $this->profileMediaDirectory);
    // }

    // protected function cloneToProfile($data, $userId)
    // {
    //     $personalInfo = $this->personalInfoModel::where('client_user_id', $userId)->first();
       
    //     if (!$personalInfo) {
    //         $createData = [
    //            'client_user_id'=>$userId,
    //            'name'=>$data['name'],
    //            $this->imageField => $data[$this->imageField] == null || $data[$this->imageField] == "" ? $this->placeholder_image_url :  $this->storeSocialProfileMedia($data[$this->imageField]),
    //         ];
    //         if ($data['type'] == $this->phoneField) {
    //             $createData[$this->phoneField] = $data[$this->phoneField];
    //         } elseif ($data['type'] == $this->facebook) {
    //             $createData[$this->phoneField] = $data[$this->phoneField];
    //             $createData[ $this->emailField] = $data[ $this->emailField];
    //         } else {
    //             $createData[ $this->emailField] = $data[ $this->emailField];
    //         }
            
    //         $this->personalInfoModel::create($createData);
    //     }
    // }
    // protected function generateNumericOTP($num)
    // {
    //     $generator = rand();
    //     $result = "";
    //     for ($i = 1; $i <= $num; $i++) {
    //         $result .= substr($generator, (rand()%(strlen($generator))), 1);
    //     }
    //     return $result;
    // }
    // protected function toRegister(array $data)
    // {
    //     return $this->userModel->create([
    //         "name" => $data['name'],
    //         $this->emailField => $data['type'] == $this->emailField ? $data[$this->emailOrPhoneField] : null,
    //         $this->phoneField => $data['type'] == $this->phoneField ? $data[$this->emailOrPhoneField] : null,
    //         $this->activeStatusField => $this->pendingActiveStatus,
    //         "login_type" =>$data['type'],
    //         $this->passwordField => Hash::make($data[$this->passwordField]),
    //         "otp_code" => null,
    //         "otp_attempt_time" => null,
    //         "user_type" => $this->registeredUser,
    //         "active_status" => $this->enableActiveStatus,
    //         "first_status" =>  $this->enableFirstStatus,
    //         "coin" => $data['coin'] ?? 0
    //     ]);
    // }
    
    // protected function toRegisterAsGuest($rewardCoin)
    // {
    //     return $this->userModel->create([
    //         "name" => 'Guest',
    //         "user_type" => $this->guest,
    //         "active_status" => $this->enableActiveStatus,
    //         "first_status" =>  $this->enableFirstStatus,
    //         "coin" => $rewardCoin
    //     ]);
    // }
   
    // protected function socialUserCreate($data)
    // {
    //     switch ($data[$this->loginTypeField]) {
    //                 case $this->facebook:
    //                     $data['facebook_id'] = $data['facebookId'];
    //                     $providerId = 'facebook_id';

    //                     break;

    //                 case $this->apple:
    //                     $data['apple_id'] = $data['appleId'];
    //                     $providerId = 'apple_id';

    //                     break;

    //                 default:
    //                     $data['email_id'] = $data['emailId'];
    //                     $providerId = 'email_id';

    //     }
    //     return $this->userModel->create([
    //         "name" => $data['name'],
    //         $this->emailField => $data[$this->emailField],
    //         $this->phoneField => $data[$this->phoneField] ?? null,
    //         $this->activeStatusField =>  $this->enableActiveStatus,
    //         "login_type" =>$data[$this->loginTypeField],
    //         $providerId => $data[$providerId],
    //         "user_type" => $this->registeredUser,
    //         "first_status" =>  $this->enableFirstStatus,
    //         "coin" => $data['coin'] ?? 0
    //     ]);
    // }

    // public function create(array $data)
    // {
    //     return $this->model->create($data);
    // }

    // public function toTempRegister($data)
    // {
    //     return Cache::store('redis')->put('client_users.'.$data['emailOrPhone'], json_encode($data), config('cache.client_users.ttl'));
    // }

    // public function getById($id)
    // {
    //     return $this->model->where('id', $id)->first();
    // }

    // public function delete($id)
    // {
    //     return $this->model->destroy($id);
    // }

    // public function softDelete($id)
    // {
    //     $getData = $this->getById($id);
    //     $getData['deleted_status'] = config('enums.enableDeletedStatus');
    //     return $getData->push();
    // }

    // public function updateFirstStatusForInitUser($userInfo)
    // {
    //     if ($userInfo->first_status != $this->disableFirstStatus){
    //        return $userInfo->update([
    //             'first_status' => $this->disableFirstStatus,
    //         ]);
    //     }
    // }
}
