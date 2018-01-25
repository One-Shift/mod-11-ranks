<?php

if(isset($id) && !empty($id) && $id != 0) {
	if(!isset($_POST['save'])) {

		$rank = new rank();
		$rank->setId($id);
		$rank = $rank->returnOneRank();

		$form_tpl = bo3::mdl_load("templates-e/edit/form.tpl");

		$mdl = bo3::c2r(
			[
				'content' => $form_tpl,
				'lg-name' => $mdl_lang['form']['name'],
				'v-name' => $rank->name,
				'lg-sort' => $mdl_lang['form']['sort'],
				'v-sort' => $rank->sort,
				'lg-code' => $mdl_lang['form']['code'],
				'v-code' => $rank->code,
				'lg-status' => $mdl_lang['form']['status'],
				'v-status' => $rank->status,
				'status-check' => ($rank->status) ? "checked" : "",
				'save-btn' => $mdl_lang['form']['save']
			],
			bo3::mdl_load("templates/edit.tpl")
		);
	} else {
		$rank = new rank();
		$rank->setId($id);
		$rank->setName($_POST['name']);
		$rank->setSort($_POST['sort']);
		$rank->setCode($_POST['code']);
		$rank->setDate();
		$rank->setDateUpdate();
		$rank->setStatus(isset($_POST["status"]) ? $_POST["status"] : 0);

		if($rank->update()) {
			$toReturn = bo3::c2r(
				[
					'message' => $mdl_lang['edit']['success'],
					'type' =>  'success'
				],
				bo3::mdl_load('templates-e/edit/message.tpl')
			);
			header( "refresh:2;url={$cfg->system->path_bo}/{$lg_s}/ranks/" );
		} else {
			$toReturn = bo3::c2r(
				[
					'message' => $mdl_lang['edit']['failure'],
					'type' =>  'danger'
				],
				bo3::mdl_load('templates-e/edit/message.tpl')
			);
			header( "refresh:5;url={$cfg->system->path_bo}/{$lg_s}/ranks/");
		}

		$mdl = bo3::c2r(['content' => $toReturn], bo3::mdl_load('templates/edit.tpl'));
	}
} else {
	header("Location: {$cfg->system->path_bo}/0/{$lg_s}/404/");
}

include "pages/module-core.php";
