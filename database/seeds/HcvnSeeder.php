<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HcvnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $citiesData = $this->getContent('tinh_tp.json');
        $districtsData = $this->getContent('quan_huyen.json');
        $wardsData = $this->getContent('xa_phuong.json');

        $tableNames = config('hcvn.table_names');
        $this->insert($tableNames['cities'], $citiesData);
        $this->insert($tableNames['districts'], $districtsData);

        foreach (collect($wardsData)->chunk(1000) as $wards) {
            $this->insert($tableNames['wards'], $wards);
        }
    }

    private function getContent($fileName): array
    {
        return json_decode(file_get_contents(public_path(config('hcvn.data_json') . "/{$fileName}")), true);
    }

    private function insert(string $tableName, $data)
    {
        foreach ($data as $id => $row) {
            $row['id'] = $id;
            $mapData[] = $row;
        }

        DB::table($tableName)->insert($mapData);
    }
}
