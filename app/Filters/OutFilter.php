<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\AttendanceModel;
use App\Models\PresenceModel;
use App\Models\PresenceUserModel;
use CodeIgniter\I18n\Time;

class OutFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $attendanceModel = new AttendanceModel();
        $presenceModel = new PresenceModel();
        $presenceUserModel = new PresenceUserModel();

        $currentTime = Time::now();
        $today = $currentTime->toDateString();
        $presenceUsers = $presenceUserModel->findAll();

        foreach ($presenceUsers as $presenceUser) {
            $setting = $presenceModel->where('id', $presenceUser['presence_id'])->first();



            $maxEndTime = Time::parse($setting['max_end_time']);





            $alreadyCheckedOut = $attendanceModel
                ->where('user_id', $presenceUser['user_id'])
                ->where('DATE(exit_time)', $today)
                ->where('DATE(created_at)', $today)
                ->first();


            if ($currentTime->isAfter($maxEndTime) && !$alreadyCheckedOut) {
                $unattendedUsers = $attendanceModel
                    ->where('user_id', $presenceUser['user_id'])
                    ->where('DATE(entry_time)', $today)
                    ->where('exit_time IS NULL')
                    ->findAll();


                foreach ($unattendedUsers as $user) {
                    $data = [
                        'presence_id' => $user['presence_id'],
                        'user_id' => $user['user_id'],
                        'photo' => NULL,
                        'location' => NULL,
                        'status' => 'Pulang',
                        'deduction' => 0,
                        'entry_time' => $user['entry_time'],
                        'exit_time' => Time::now(),
                        'start_time' => $user['entry_time'],
                    ];

                    $attendanceModel->save($data);
                }
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here if needed
    }
}
