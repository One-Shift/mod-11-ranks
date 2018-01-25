<?php

	if (isset($id) && !empty($id)) {
		// Return all category info
		$rank = new rank();
		$rank->setId($id);
		$toReturn = "";

		if (isset($_POST["submit"])) {
			if ($rank->delete()) {
				$toReturn = $mdl_lang["delete"]["success"];
				header( "refresh:2;url={$cfg->system->path_bo}/{$lg_s}/ranks/" );
			} else {
				$toReturn =  $mdl_lang["delete"]["failure"];
			}
		} else {
			$rank = $rank->returnOneRank();
			$toReturn = bo3::c2r(
				[
					"id" => $id,

					"phrase" => $mdl_lang["delete"]["phrase"],
					'name' => $rank->name,

					"del" => $mdl_lang["delete"]["button-del"],
					"cancel" => $mdl_lang["delete"]["button-cancel"]
				],
				bo3::mdl_load("templates-e/delete/form.tpl")
			);
		}

		$mdl = bo3::c2r(["content" => $toReturn], bo3::mdl_load("templates/del.tpl"));
	} else {
		// if doesn't exist an action response, system sent you to 404
		header("Location: {$cfg->system->path_bo}/0/{$lg_s}/404/");
	}

include "pages/module-core.php";
