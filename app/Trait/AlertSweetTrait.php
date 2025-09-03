<?php

namespace App\Trait;

use SweetAlert2\Laravel\Swal;

trait AlertSweetTrait
{
    public function generateAlert($type, $message): void
    {
        switch ($type){
            Case 'success':
                $this->success($message);
                break;

            Case 'error':
                $this->error($message);
                break;

            Case 'info':
                $this->info($message);
        }
    }

    public function success($message): void
    {
        Swal::toastSuccess([
            'title' => $message,
            'position' => 'top-end',
            'timer' => 3000,
            'timerProgressBar' => true,
            'showConfirmButton' => false,
        ]);
    }

    public function error($message): void
    {
        Swal::toastError([
            'title' => $message,
            'position' => 'top-end',
            'timer' => 3000,
            'timerProgressBar' => true,
            'showConfirmButton' => false,
        ]);
    }
    public function info($message): void
    {
        Swal::toastInfo([
            'title' => $message,
            'position' => 'top-end',
            'timer' => 3000,
            'timerProgressBar' => true,
            'showConfirmButton' => false,
        ]);
    }
}
