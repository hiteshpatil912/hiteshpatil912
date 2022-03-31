<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Log;

class UsersImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        // Log::debug($rows);
        foreach ($rows as $row){
            $user = User::find($row[0]);
            if($user){
                $user->update([
                    'firstName'     => $row[2],
                    'lastName'    => $row[3],
                    'phone'    => $row[4],
                    'birthDate'    => $row[5],
                    'image'    => $row[11],
                ]);
            }
        }
    }
}
