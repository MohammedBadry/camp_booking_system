<?php

namespace App\Imports;

use App\Models\Booking;
use App\Models\Coupon;
use App\Models\Trip;
use App\Models\Sale;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;
use Auth;

class BookingsImportCamp implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading, WithValidation, SkipsOnFailure
{

    use Importable;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $trip = Trip::where(['code' => $row['code'], 'type_id' => 2])->firstOrFail();
            $members_reference = rand(100000, 999999);
            if($row['coupon_code']!="") {
                $coupon = Coupon::where(['code' => $row['coupon_code'], 'status' => 1])->first();
                $coupon_id = $coupon->id;
                $total_paid = (($trip->price*$row['days'])-(($trip->price*$coupon->discount)/100));
            } else {
                $total_paid = $trip->price*$row['days'];
                $coupon_id = NULL;
            }
            $sep_period = explode('-', $row['period']);
            $period_from = $sep_period[0];
            $period_to = $sep_period[1];
            $trip_bookings = Booking::where(['trip_id' => $trip->id, 'category_id' => 2, 'payment_status' => 'paid'])
            ->where(function ($query) use ($period_from, $period_to) {
                $query->where(function ($query) use ($period_from) {
                    $query->where('period_from', '<=', $period_from)
                        ->where('period_to', '>=', $period_from);
                })
                ->orWhere(function ($query) use ($period_to) {
                    $query->where('period_from', '<=', $period_to)
                        ->where('period_to', '>=', $period_to);
                });
            })
            ->get()->count();
            $available_seets = $trip->camps_num-$trip_bookings;
            if($available_seets>0) {
                $booking = Booking::create([
                    'members_reference' => $members_reference,
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'mobile' => $row['mobile'],
                    'passport' => $row['passport'],
                    'trip_id' => $trip->id,
                    'category_id' => $trip->type_id,
                    'coupon_id' => $coupon_id,
                    'total_paid' => $total_paid,
                    'period' => $row['period'],
                    'period_from' => $period_from,
                    'period_to' => $period_to,
                    'added_by' => Auth::user()->id,
                    'payment_status' => 'paid',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                if($trip->type_id==1) {
                    if($trip->status==1) {
                        $trip_type = 'عامة';
                    } else {
                        $trip_type = 'خاصة';
                    }
                } else {
                    $trip_type = NULL;
                }
                $sale = Sale::create([
                    'booking_id' => $booking->id,
                    'members_reference' => $members_reference,
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'mobile' => $row['mobile'],
                    'passport' => $row['passport'],
                    'booking_type' => $trip->type_id==1 ? 'رحلة' : 'مخيم',
                    'trip_code' => $trip->code,
                    'trip_category' => $trip->category->name,
                    'trip_type' =>  $trip_type,
                    'trip_date' => $trip->type_id==1 ? $trip->trip_date : NULL,
                    'trip_price' => $trip->price,
                    'operator' => $trip->type_id==1 ? $trip->operator->name.' - #'.$trip->operator->id : NULL,
                    'total_paid' => $total_paid,
                    'period' => $row['period'],
                    'period_from' => $period_from,
                    'period_to' => $period_to,
                    'added_by' => Auth::user()->name. ' - #'.Auth::user()->id,
                    'payment_status' => 'paid',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    public function rules(): array
    {
        return [
            'code' => [
                'required',
                'exists:trips',
            ],
        ];
    }

    public function onFailure(Failure ...$failures)
    {
        // Handle the failures how you'd like.
    }

    public function batchSize(): int
    {
        return 1;
    }

    public function chunkSize(): int
    {
        return 1;
    }
}
