<?php

namespace App\Exports;

use App\Models\Sale;
use App\Models\Coupon;
use App\Models\Trip;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Auth;

class BookingsExport implements FromCollection, WithMapping, WithHeadings
{

    use Exportable;

    public function collection()
    {
        return Sale::paid()->get();
    }

    public function map($booking): array
    {
        return [
            $booking->id,
            $booking->name,
            $booking->mobile,
            $booking->email,
            $booking->passport,
            $booking->trip_category,
            $booking->category_id==1 ? $booking->type_id==1 ? 'عامة' : 'خاصة' :  '-',
            $booking->trip_code,
            $booking->trip_date,
            $booking->price .'   ريال',
            $booking->total_paid .'   ريال',
            $booking->category_id==1 ? $booking->created_at : $booking->period,
        ];
    }

    public function headings(): array
    {
        return [
            'رقم الحجز',
            'اسم المستخدم',
            'الهاتف',
            'الإيميل',
            'رقم الهوية',
            'نوع الحجز',
            'نوع الرحلة',
            'كود الرحلة/المخيم',
            'تاريخ الرحلة',
            'السعر',
            'المبلغ المدفوع',
            'تاريخ الحجز',
        ];
    }
}
