<?php

$entries = new rank();
$entries = $entries->returnAllEntries();

foreach ($entries as $i => $entry) {
	if (!isset($list)) {
		$list = "";
		$row_tpl = bo3::mdl_load('templates-e/home/row.tpl');
	}

	$list .= bo3::c2r(
		[
			'id' => $entry->id,
			'name' => $entry->name,
			'code' => $entry->code,
			'sort' => $entry->sort,
			'status' => ($entry->status) ? "fa-toggle-on" : "fa-toggle-off",
			'date' => date("Y-m-d", strtotime($entry->date)),
			'date-update' => $entry->date_update,
			'rank-edit' => $mdl_lang['home']['edit'],
			'rank-delete' => $mdl_lang['home']['delete']
		],
		$row_tpl
	);
}

$mdl = bo3::c2r(
	[
		'list' => isset($list) ? $list : '',
		'rank-add' => $mdl_lang['home']['add']
	],
	bo3::mdl_load("templates/home.tpl")
);

include "pages/module-core.php";
