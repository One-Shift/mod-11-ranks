<?php

class rank {
	protected $id;
	protected $name;
	protected $code;
	protected $sort;
	protected $date;
	protected $date_update;
	protected $status = false;
	protected $user_id;

	public function __construct() {}

	public function setId($i) {
		$this->id = $i;
	}

	public function setName($n) {
		$this->name = $n;
	}

	public function setCode($c) {
		$this->code = $c;
	}

	public function setSort($s) {
		$this->sort = $s;
	}

	public function setDate($d = null) {
		$this->date = ($d !== null) ? $d : date("Y-m-d H:i:s", time());
	}

	public function setDateUpdate($d = null) {
		$this->date_update = ($d !== null) ? $d : date("Y-m-d H:i:s", time());
	}

	public function setUserId($u) {
		$this->user_id = $u;
	}

	public function setStatus($q) {
		$this->status = $q;
	}


	public function insert() {
		global $cfg, $db;

		$query = sprintf(
			"INSERT INTO %s_ranks (name, code, sort, user_id, date, date_update, status) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')",
			$cfg->db->prefix,
			$this->name,
			$this->code,
			$this->sort,
			$this->user_id,
			$this->date,
			$this->date_update,
			$this->status
		);

		$toReturn = $db->query($query);

		$this->id = $db->insert_id;

		return $toReturn;
	}

	public function update() {
		global $cfg, $db;

		$query = sprintf(
			"UPDATE %s_ranks SET name = '%s', code = '%s', sort = '%s', user_id = '%s', date = '%s', date_update = '%s', status = '%s' WHERE id = '%s'",
			$cfg->db->prefix,
			$this->name,
			$this->code,
			$this->sort,
			$this->user_id,
			$this->date,
			$this->date_update,
			$this->status,
			$this->id
		);

		return $db->query($query);
	}

	public function delete() {
		global $cfg, $db, $authData;

		$entry = new rank();
		$entry->setId($this->id);
		$entry = $entry->returnOneRank();

		$trash = new trash();
		$trash->setCode(json_encode($entry));
		$trash->setDate();
		$trash->setModule($cfg->mdl->folder);
		$trash->setUser($authData["id"]);
		$trash->insert();

		unset($entry);

		$query = sprintf(
			"DELETE FROM %s_ranks WHERE id = '%s'",
			$cfg->db->prefix,
			$this->id
		);

		return $db->query($query);
	}

	public function returnObject() {
		return get_object_vars($this);
	}

	public function returnOneRank() {
		global $cfg, $db;

		$query = sprintf("SELECT * FROM %s_ranks WHERE id = '%s' LIMIT 1", $cfg->db->prefix, $this->id);
		$source = $db->query($query);

		return $source->fetch_object();
	}

	public function returnAllEntries() {
		global $cfg, $db;

		$query = sprintf("SELECT * FROM %s_ranks WHERE true", $cfg->db->prefix);
		$source = $db->query($query);

		$toReturn = [];
		$i = 0;

		while ($data = $source->fetch_object()) {
			$toReturn[$i] = $data;
			$i++;
		}

		return $toReturn;
	}
}
