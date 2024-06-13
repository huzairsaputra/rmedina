<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default = [
            ['key'=>'OWNER_NAME', 'value'=>'Diskominfotik Kota Banda Aceh'],
            ['key'=>'OWNER_LOGO', 'value'=>'https://bandaacehkota.go.id/wp-content/themes/humas-bna-2019/assets/img/pemko.png'],
            ['key'=>'OWNER_FAVICON', 'value'=>'https://bandaacehkota.go.id/wp-content/themes/humas-bna-2019/assets/img/ico/favicon.png'],
            ['key'=>'OWNER_COMPANY_NAME', 'value'=>'Diskominfotik Kota Banda Aceh'],
            ['key'=>'OWNER_PHONE', 'value'=>'(0651) 8013993'],
            ['key'=>'OWNER_EMAIL', 'value'=>''],
            ['key'=>'OWNER_ADDRESS', 'value'=>'Jl. T. Nyak Arief No. 130, Gampong Prada, Kecamatan Syiah Kuala Banda Aceh, 23115'],
            ['key'=>'OWNER_SOCMED_FB', 'value'=>'https://www.facebook.com/diskominfotik.bna/'],
            ['key'=>'OWNER_SOCMED_TWITTER', 'value'=>'https://twitter.com/diskominfo_bna'],
            ['key'=>'OWNER_SOCMED_WEB', 'value'=>'http://diskominfo.bandaacehkota.go.id/'],
            ['key'=>'OWNER_SOCMED_IG', 'value'=>'https://www.instagram.com/diskominfotikbna/'],
            ['key'=>'OWNER_COPYRIGHT', 'value'=>'© 2021 Diskominfotik Banda Aceh'],

            ['key'=>'DEVELOPER_NAME', 'value'=>'Tim Developer Diskominfotik Banda Aceh'],
            ['key'=>'DEVELOPER_LOGO', 'value'=>'https://bandaacehkota.go.id/wp-content/themes/humas-bna-2019/assets/img/pemko.png'],
            ['key'=>'DEVELOPER_FAVICON', 'value'=>'https://bandaacehkota.go.id/wp-content/themes/humas-bna-2019/assets/img/ico/favicon.png'],
            ['key'=>'DEVELOPER_COMPANY_NAME', 'value'=>'Diskominfotik Kota Banda Aceh'],
            ['key'=>'DEVELOPER_PHONE', 'value'=>'626518013993'],
            ['key'=>'DEVELOPER_EMAIL', 'value'=>''],
            ['key'=>'DEVELOPER_SOCMED_FB', 'value'=>'https://www.facebook.com/diskominfotik.bna/'],
            ['key'=>'DEVELOPER_SOCMED_TWITTER', 'value'=>'https://twitter.com/diskominfo_bna'],
            ['key'=>'DEVELOPER_SOCMED_WEB', 'value'=>'http://diskominfo.bandaacehkota.go.id/'],
            ['key'=>'DEVELOPER_SOCMED_IG', 'value'=>'https://www.instagram.com/diskominfotikbna/'],
            ['key'=>'DEVELOPER_SOCMED_TELEGRAM', 'value'=>''],
            ['key'=>'DEVELOPER_SOCMED_WA', 'value'=>''],
            ['key'=>'DEVELOPER_SOCMED_PLAYSTORE', 'value'=>''],
            ['key'=>'DEVELOPER_SOCMED_GITHUB', 'value'=>''],
            ['key'=>'DEVELOPER_SOCMED_LINKEDIN', 'value'=>''],
            ['key'=>'DEVELOPER_COPYRIGHT', 'value'=>'Copyright © 2021 Tim Developer Diskominfotik Banda Aceh'],
        ];
        foreach ($default as $record){
            [$search, $otherValue] = $this->getRecord($record);

            Config::firstOrCreate($search, $otherValue);
        }
    }

    private function getRecord($record){
        return [
            ['key' => $record['key']],
            [
                'value' => $record['value'],
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
    }
}
