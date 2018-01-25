<div class="xs-spacer30 sm-spacer30"></div>
<form method="post" name="edit-rank" id="form" enctype="multipart/form-data">
	<div class="col-xs-12 col-sm-12 col-md-6">
		<div class="form-group">
			<label for="inputName">{c2r-lg-name}</label>
			<input type="text" class="form-control" id="inputName" name="name" value="{c2r-v-name}" required>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6">
		<div class="form-group">
			<label for="inputSort">{c2r-lg-sort}</label>
			<input name="sort" id="inputSort" type="number" class="form-control" value="{c2r-v-sort}" required>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12">
		<div class="form-group">
			<label for="inputCode">{c2r-lg-code}</label>
			<textarea class="form-control" rows="10" name="inputCode" id="inputCode" value="{c2r-v-code}" style="resize: vertical;"></textarea>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 xs-tacenter sm-taright">
		<div class="form-group">
			<div class="checkbox">
				<label><input name="status" id="inputStatus" type="checkbox" {c2r-status-check} value="1">{c2r-lg-status}</label>
			</div>
		</div>
	</div>
	<div class=" col-xs-12 col-sm-12 md-taright xs-tacenter">
		<button type="submit" class="btn btn-success" name="save">{c2r-save-btn}</button>
	</div>
</form>
