<?php

namespace Database\Seeders;

use App\Models\ParamCategory;
use App\Models\Parameter;
use App\Models\Program;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ParameterSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Target specification:
		$categories = [];
		$key = 'Target specification';
		$categories[$key][] = $this->makeParam('-iL', 'Input from list of hosts/networks', true, 'input file name');
		$categories[$key][] = $this->makeParam('-iR', 'Choose random targets', true, 'num hosts');
		$categories[$key][] = $this->makeParam(
			'--exclude', 'Exclude hosts/networks', true, 'host1[,host2][,host3],...'
		);
		$categories[$key][] = $this->makeParam('--excludefile', 'Exclude list from file', true, 'exclude_file');
		//Host discovery:
		$key = 'Host discovery';
		$categories[$key][] = $this->makeParam('-sL', 'List Scan - simply list targets to scan');
		$categories[$key][] = $this->makeParam('-sn', 'Ping Scan - disable port scan');
		$categories[$key][] = $this->makeParam('-Pn', 'Treat all hosts as online -- skip host discovery');
		$categories[$key][] = $this->makeParam('-PS', 'TCP SYN discovery to given ports', true, 'portlist');
		$categories[$key][] = $this->makeParam('-PA', 'TCP ACK discovery to given ports', true, 'portlist');
		$categories[$key][] = $this->makeParam('-PU', 'UDP discovery to given ports', true, 'portlist');
		$categories[$key][] = $this->makeParam('-PY', 'SCTP discovery to given ports', true, 'portlist');
		$categories[$key][] = $this->makeParam('-PE', 'ICMP echo request discovery probes');
		$categories[$key][] = $this->makeParam('-PP', 'ICMP timestamp request discovery probes');
		$categories[$key][] = $this->makeParam('-PM', 'ICMP netmask request discovery probes');
		$categories[$key][] = $this->makeParam('-PO', 'IP Protocol Ping', true, 'protocol list');
		$categories[$key][] = $this->makeParam('-n', 'Never do DNS resolution [default: sometimes]');
		$categories[$key][] = $this->makeParam('-R', 'Always resolve [default: sometimes]');
		$categories[$key][] = $this->makeParam(
			'--dns-servers', 'Specify custom DNS servers', true, 'serv1[,serv2],...'
		);
		$categories[$key][] = $this->makeParam('--system-dns', "Use OS's DNS resolver");
		$categories[$key][] = $this->makeParam('--traceroute', 'Trace hop path to each host');
		//Scan techniques:
		$key = 'Scan techniques';
		$categories[$key][] = $this->makeParam('-sS', 'TCP SYN scans');
		$categories[$key][] = $this->makeParam('-sT', 'TCP Connect() scans');
		$categories[$key][] = $this->makeParam('-sA', 'TCP ACK scans');
		$categories[$key][] = $this->makeParam('-sW', 'TCP Window scans');
		$categories[$key][] = $this->makeParam('-sM', 'TCP Maimon scans');
		$categories[$key][] = $this->makeParam('-sU', 'UDP Scan');
		$categories[$key][] = $this->makeParam('-sN', 'TCP Null scans');
		$categories[$key][] = $this->makeParam('-sF', 'TCP FIN scans');
		$categories[$key][] = $this->makeParam('-sX', 'TCP Xmas scans');
		$categories[$key][] = $this->makeParam('--scanflags', 'Customize TCP scan flags', true, 'flags');
		$categories[$key][] = $this->makeParam('-sI', 'Idle scan', true, 'zombie host[:probeport]');
		$categories[$key][] = $this->makeParam('-sY', 'SCTP INIT scans');
		$categories[$key][] = $this->makeParam('-sZ', 'SCTP COOKIE-ECHO scans');
		$categories[$key][] = $this->makeParam('-sO', 'IP protocol scan');
		$categories[$key][] = $this->makeParam('-b', 'FTP bounce scan', true, 'FTP relay host');
		//Port specification and scan order:
		$key = 'Port specification and scan order';
		$categories[$key][] = $this->makeParam('-p', 'Only scan specified ports', true, 'port ranges');
		$categories[$key][] = $this->makeParam(
			'--exclude-ports', 'Exclude the specified ports from scanning', true, 'port ranges'
		);
		$categories[$key][] = $this->makeParam('-F', 'Fast mode - Scan fewer ports than the default scan');
		$categories[$key][] = $this->makeParam('-r', "Scan ports consecutively - don't randomize");
		$categories[$key][] = $this->makeParam('--top-ports', 'Scan <number> most common ports', true, 'number');
		$categories[$key][] = $this->makeParam('--port-ratio', 'Scan ports more common than <ratio>', true, 'ratio');
		//Service/Version detection:
		$key = 'Service/Version detection';
		$categories[$key][] = $this->makeParam(
			'-sV', 'Probe open ports to determine service/version info'
		);
		$categories[$key][] = $this->makeParam(
			'--version-intensity', 'Set from 0 (light) to 9 (try all probes)', true, 'level'
		);
		$categories[$key][] = $this->makeParam(
			'--version-light', 'Limit to most likely probes (intensity 2)'
		);
		$categories[$key][] = $this->makeParam(
			'--version-all', 'Try every single probe (intensity 9)'
		);
		$categories[$key][] = $this->makeParam(
			'--version-trace', 'Show detailed version scan activity (for debugging)'
		);
		//OS detection
		$key = 'OS detection';
		$categories[$key][] = $this->makeParam('-O', 'Enable OS detection');
		$categories[$key][] = $this->makeParam('--osscan-limit', 'Limit OS detection to promising targets');
		$categories[$key][] = $this->makeParam('--osscan-guess', 'Guess OS more aggressively');
		//Output:
		$key = 'Output';
		$categories[$key][] = $this->makeParam('-oN', 'Output scan in normal format', true, 'file');
		$categories[$key][] = $this->makeParam('-oX', 'Output scan in XML format', true, 'file');
		$categories[$key][] = $this->makeParam('-oS', 'Output scan in s|<rIpt kIddi3 format', true, 'file');
		$categories[$key][] = $this->makeParam('-oG', 'Output scan in Grepable format', true, 'file');
		$categories[$key][] = $this->makeParam('-oA', 'Output in the three major formats at once', true, 'basename');
		$categories[$key][] = $this->makeParam('-v', 'Increase verbosity level (use -vv or more for greater effect)');
		$categories[$key][] = $this->makeParam('-d', 'Increase debugging level (use -dd or more for greater effect)');
		$categories[$key][] = $this->makeParam('--reason', 'Display the reason a port is in a particular state');
		$categories[$key][] = $this->makeParam('--open', 'Only show open (or possibly open) ports');
		$categories[$key][] = $this->makeParam('--packet-trace', 'Show all packets sent and received');
		$categories[$key][] = $this->makeParam('--iflist', 'Print host interfaces and routes (for debugging)');
		$categories[$key][] = $this->makeParam(
			'--append-output', 'Append to rather than clobber specified output files'
		);
		$categories[$key][] = $this->makeParam('--resume', 'Resume an aborted scan', true, 'filename');
		$categories[$key][] = $this->makeParam(
			'--stylesheet', 'XSL stylesheet to transform XML output to HTML', true, 'path/URL'
		);
		$categories[$key][] = $this->makeParam('--webxml', 'Reference stylesheet from Nmap.Org for more portable XML');
		$categories[$key][] = $this->makeParam('--no-stylesheet', 'Prevent associating of XSL stylesheet w/XML output');
		//Misc:
		$key = 'Miscellaneous';
		$categories[$key][] = $this->makeParam('-6', 'Enable IPv6 scanning');
		$categories[$key][] = $this->makeParam(
			'-A', 'Enable OS detection, version detection, script scanning, and traceroute'
		);
		$categories[$key][] = $this->makeParam('--datadir', 'Specify custom Nmap data file location', true, 'dirname');
		$categories[$key][] = $this->makeParam('--send-eth', 'Send using raw ethernet frames');
		$categories[$key][] = $this->makeParam('--send-ip', 'Send using IP packets');
		$categories[$key][] = $this->makeParam('--privileged', 'Assume that the user is fully privileged');
		$categories[$key][] = $this->makeParam('--unprivileged', 'Assume the user lacks raw socket privileges');
		$categories[$key][] = $this->makeParam('-V', 'Print version number');
		$categories[$key][] = $this->makeParam('-h', 'Print this help summary page');
		foreach ($categories as $categorySluggable => $params) {
			/**
			 * @var $program Program
			 */
			$program = Program::query()
			                  ->firstWhere('name', 'nmap');
			/**
			 * @var $category ParamCategory
			 */
			$category = $program->paramCategories()
			                    ->save(
				                    ParamCategory::factory()
				                                 ->make(
					                                 [
						                                 'title' => $categorySluggable,
						                                 'name' => Str::slug(
							                                 $categorySluggable
						                                 ),
					                                 ]
				                                 )
			                    );
			$newParams = collect();
			foreach ($params as $param) {
				$newParams->add(
					Parameter::factory()
					         ->make($param)
				);
			}
			$category->parameters()
			         ->saveMany($newParams);
		}
	}

	public function makeParam($param, $description, $accepts = false, $tip = '')
	{
		return [
			'param' => $param, 'description' => $description, 'accepts_values' => $accepts, 'tip_for_values' => $tip,
		];
	}
}
