<?php

namespace cinema;

class Program {

	private $name;
	private $path = false;
	private $program = [];
	private $status;


	// create the cinema object
	// set the basic content path
	// create path if not exists
	public function __construct($name) {

		$this->name = $name;

		$this->reset();

		$this->path = Config::path_program();

		// check for directory
		if (!file_exists($this->path)) {

			if (!mkdir($this->path, 0666, true)) {

				$this->path = false;
				Message::failure("failure_mk_program_dir");
			}
		}

		$this->load();
		$this->status();
	}


	public function reset() {

		$this->status = [
			"id" => "",
			"status" => "stop",
			"name" => "",
			"user" => "",
			"uuid" => "",
			"duration" => "",
			"timestamp" => ""
		];

	}


	// load a program
	private function load() {

		$path = Path::create([$this->path, $this->name . ".ini"]);

		if ($this->path) {

			if (file_exists($path)) {
				$this->program = parse_ini_file($path, true);
			}

			else {
				Message::failure("failure_program_not_found");
			}
		} 
	}


	// set a new status
	// write to file
	public function set($key, $value) {
		$this->status[$key] = $value;
	}


	public function clear($key) {

		if (isset($this->status[$key])) {
			unset($this->status[$key]);
		}

	}


	public function get($key) {

		if (isset($this->status[$key])) {
			return $this->status[$key];
		}

		return false;
	} 


	// write status file
	public function write() {

		// update timestamp
		$this->status["timestamp"] = time();

		file_put_contents(Path::create([$this->path, $this->name . ".status.ini"]), Array2Ini::serialize($this->status));

		// copy(Path::create([$this->path, $this->name . ".status.new"]), Path::create([$this->path, $this->name . ".status.ini"]));
	}


	// load the status of a program
	public function status() {

		$path = Path::create([$this->path, $this->name . ".status.ini"]);

		if ($this->path) {

			if (file_exists($path)) {
				$this->status = parse_ini_file($path, true);
			}
		}

		return ["status" => $this->status];
	}


}