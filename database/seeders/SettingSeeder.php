<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [   'name' => 'name',
                'type'=>'string',
                'description'=>'Website name',
                'value'=>'Admin Panel Laravel 9',
                'setting_group_id'=>'1'
            ],
            [   'name' => 'logo',
                'type'=>'file',
                'description'=>'Logo',
                'value'=>'/uploads/settings/logo.png',
                'setting_group_id'=>'1'
            ],
            [   'name' => 'url',
                'type'=>'string',
                'description'=>'Website Address',
                'value'=>'http://localhost:8000',
                'setting_group_id'=>'1'
            ],

            [   'name' => 'terms',
                'type'=>'textarea',
                'description'=>'Term Of Use',
                'value'=>'<p>Some rules...</p>',
                'setting_group_id'=>'2'
            ],
            [   'name' => 'about_us',
                'type'=>'textarea',
                'description'=>'About us',
                'value'=>'<p>About US</p>',
                'setting_group_id'=>'2'
            ],
            [   'name' => 'contact_us',
                'type'=>'textarea',
                'description'=>'Contact us',
                'value'=>'<p>Contact US</p>',
                'setting_group_id'=>'3'
            ],
            [   'name' => 'email',
                'type'=>'string',
                'description'=>'E-mail',
                'value'=>'support@site.com',
                'setting_group_id'=>'2'
            ],
            [   'name' => 'phone',
                'type'=>'string',
                'description'=>'Phone',
                'value'=>'+1 123 456 7892',
                'setting_group_id'=>'2'
            ],
        ];
        foreach ($settings as $setting)
        {
            Setting::create($setting);
        }
        //
    }
}
