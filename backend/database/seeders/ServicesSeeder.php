<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $homeServices = [
            ['en' => 'Cleaning', 'ar' => 'التنظيف'],
            ['en' => 'Lawn Care', 'ar' => 'العناية بالحدائق'],
            ['en' => 'Plumbing', 'ar' => 'السباكة'],
            ['en' => 'Electrical Repairs', 'ar' => 'إصلاحات الكهرباء'],
            ['en' => 'Painting', 'ar' => 'الدهان'],
            ['en' => 'Pest Control', 'ar' => 'مكافحة الحشرات'],
            ['en' => 'HVAC Maintenance', 'ar' => 'صيانة التكييف'],
            ['en' => 'Roofing', 'ar' => 'إصلاح الأسطح'],
            ['en' => 'Carpet Cleaning', 'ar' => 'تنظيف السجاد'],
            ['en' => 'Window Cleaning', 'ar' => 'تنظيف النوافذ'],
            ['en' => 'Gutter Cleaning', 'ar' => 'تنظيف المزاريب'],
            ['en' => 'Appliance Repair', 'ar' => 'إصلاح الأجهزة المنزلية'],
            ['en' => 'Handyman Services', 'ar' => 'خدمات الصيانة العامة'],
            ['en' => 'Landscaping', 'ar' => 'تنسيق الحدائق'],
            ['en' => 'Pool Maintenance', 'ar' => 'صيانة حمامات السباحة'],
            ['en' => 'Snow Removal', 'ar' => 'إزالة الثلوج'],
            ['en' => 'Moving Services', 'ar' => 'خدمات النقل'],
            ['en' => 'Home Renovation', 'ar' => 'تجديد المنازل'],
            ['en' => 'Furniture Assembly', 'ar' => 'تركيب الأثاث'],
            ['en' => 'Security System Installation', 'ar' => 'تركيب أنظمة الأمان'],
        ];

        foreach ($homeServices as $service) {
            Service::create([
                'name' => $service
            ]);
        }
    }

}
