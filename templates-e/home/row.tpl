<tr>
	<th scope="row" class="sm-tacenter">{c2r-id}</th>
	<td>{c2r-name}</td>
	<td>{c2r-code}</td>
	<td>{c2r-sort}</td>
	<td class="sm-tacenter"><i class="fa {c2r-status}" aria-hidden="true"></i></td>
	<td title="Date Update: {c2r-date-update}" class="">{c2r-date}</td>
	<td class="md-taright xs-tacenter">
		<a href="{c2r-path-bo}/{c2r-lg}/{c2r-module-folder}/edit/{c2r-id}" class="btn btn-edit" role="button">
			<i class="fa fa-pencil" aria-hidden="true"></i>
			<span class="sm-block15 xs-block15"></span>
			{c2r-rank-edit}
		</a>
		<a href="{c2r-path-bo}/{c2r-lg}/{c2r-module-folder}/delete/{c2r-id}" class="btn btn-cancel" role="button">
			<i class="fa fa-trash" aria-hidden="true"></i>
			<span class="sm-block15 xs-block15"></span>
			{c2r-rank-delete}
		</a>
	</td>
</tr>
