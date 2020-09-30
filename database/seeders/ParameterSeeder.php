<?php

namespace Database\Seeders;

use App\Models\Parameter;
use App\Models\Program;
use Illuminate\Database\Seeder;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [];
        $params[] = $this->makeParam('-sL', 'List Scan - simply list targets to scan');
        $params[] = $this->makeParam('-sn', 'Ping Scan - disable port scan');
        $params[] = $this->makeParam('-Pn', 'Treat all hosts as online -- skip host discovery');
        $params[] = $this->makeParam('--traceroute', 'Trace hop path to each host');

        foreach ($params as $param) {
            Program::firstWhere('name', 'nmap')->parameters()->save(Parameter::factory()->make($param));
        }
    }

    public function makeParam($param, $description)
    {
        return ['param' => $param, 'description' => $description];
    }
}
