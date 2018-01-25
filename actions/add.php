<?php

if(!isset($_POST['save'])) {
	$form_tpl = bo3::mdl_load("templates-e/add/form.tpl");

	$mdl = bo3::c2r(
		[
			'content' => $form_tpl,
			'lg-name' => $mdl_lang['form']['name'],
			'name-placeholder' => $mdl_lang['form']['name-placeholder'],
			'lg-sort' => $mdl_lang['form']['sort'],
			'sort-placeholder' => $mdl_lang['form']['sort-placeholder'],
			'lg-code' => $mdl_lang['form']['code'],
			'code-placeholder' => $mdl_lang['form']['code-placeholder'],
			'lg-status' => $mdl_lang['form']['status'],
			'save-btn' => $mdl_lang['form']['save']
		],
		bo3::mdl_load("templates/add.tpl")
	);
} else {
	$rank = new rank();
	$rank->setName($_POST['name']);
	$rank->setSort($_POST['sort']);
	$rank->setCode($_POST['code']);
	$rank->setDate();
	$rank->setDateUpdate();
	$rank->setStatus(isset($_POST["status"]) ? $_POST["status"] : 0);

	if($rank->insert()) {
		$toReturn = bo3::c2r(
			[
				'message' => $mdl_lang['add']['success'],
				'type' =>  'success'
			],
			bo3::mdl_load('templates-e/add/message.tpl')
		);
		header( "refresh:2;url={$cfg->system->path_bo}/{$lg_s}/ranks/" );
	} else {
		$toReturn = bo3::c2r(
			[
				'message' => $mdl_lang['add']['failure'],
				'type' =>  'danger'
			],
			bo3::mdl_load('templates-e/add/message.tpl')
		);
		header( "refresh:5;url={$cfg->system->path_bo}/{$lg_s}/ranks/");
	}

	$mdl = bo3::c2r(['content' => $toReturn], bo3::mdl_load('templates/add.tpl'));
}

include "pages/module-core.php";
