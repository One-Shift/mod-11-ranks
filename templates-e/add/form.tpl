<div class="xs-spacer30 sm-spacer30"></div>
<form method="post" name="add-rank" id="form" enctype="multipart/form-data">
	<div class="col-xs-12 col-sm-12 col-md-6">
		<div class="form-group">
			<label for="inputName">{c2r-lg-name}</label>
			<input type="text" class="form-control" id="inputName" name="name" placeholder="{c2r-name-placeholder}" required>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6">
		<div class="form-group">
			<label for="inputSort">{c2r-lg-sort}</label>
			<input name="sort" id="inputSort" type="number" class="form-control" placeholder="{c2r-sort-placeholder}" required>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12">
		<div class="form-group">
			<label for="inputCode">{c2r-lg-code}</label>
			<textarea class="form-control" rows="10" name="inputCode" id="inputCode" placeholder="{c2r-code-placeholder}" style="resize: vertical;"></textarea>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 xs-tacenter sm-taright">
		<div class="form-group">
			<div class="checkbox">
				<input name="inputStatus" value="0" type="hidden">
				<label><input name="status" id="inputStatus" type="checkbox" value="1">{c2r-lg-status}</label>
			</div>
		</div>
	</div>
	<div class=" col-xs-12 col-sm-12 md-taright xs-tacenter">
		<button type="submit" class="btn btn-success" name="save">{c2r-save-btn}</button>
	</div>
</form>
