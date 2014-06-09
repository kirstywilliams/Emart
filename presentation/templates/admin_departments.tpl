{* admin_departments.tpl *}
{load_presentation_object filename="admin_departments" assign="obj"}
	<div class="heading">eMart Departments</div>
	<form method="post" action="{$obj->mLinkToDepartmentsAdmin}">
		{if $obj->mErrorMessage}
			<div class="errorMessage">
				{$obj->mErrorMessage}
			</div>
		{/if}
		{if $obj->mDepartmentsCount eq 0}
			<div class="noitemsfound">
				There are no departments in your database!
			</div><!-- end noitemsfound -->
		{else}
			<table class="records">
				<tr>
				<th class="record-values-d4">Department Name</th>
				<th class="record-values-d4">Manager</th>
				<th class="record-values-d4">Tel Number</th>
				<th class="record-values-d4">Description</th>
				<th class="record-values-tools">Tools</th>
				</tr>

				{section name=i loop=$obj->mDepartments}
					{if $obj->mEditItem == $obj->mDepartments[i].departmentID}
						<tr>
							<td>
								<input type="text" name="name" value="{$obj->mDepartments[i].name}" size="20" />
							</td>
							<td>
								<input type="text" name="manager" value="{$obj->mDepartments[i].manager}" size="20" />
							</td>
							<td>
								<input type="text" name="number" value="{$obj->mDepartments[i].telephoneNumber}" size="20" />
							</td>
							<td>
								{strip}
									<textarea name="description" rows="3" cols="30">
										{$obj->mDepartments[i].description}
									</textarea>
								{/strip}
							</td>
							<td>
								<input class="tool-button" type="submit" name="submit_edit_cat_{$obj->mDepartments[i].departmentID}" value="Edit Categories" />
								<input class="tool-button edit-button" type="submit" name="submit_update_dept_{$obj->mDepartments[i].departmentID}" value="Update" />
								<input class="tool-button" type="submit" name="cancel" value="Cancel" />
								<input class="tool-button delete-button" type="submit" name="submit_delete_dept_{$obj->mDepartments[i].departmentID}" value="Delete" />
							</td>
						</tr>
					{else}
						<tr>
							<td>{$obj->mDepartments[i].name}</td>
							<td>{$obj->mDepartments[i].manager}</td>
							<td>{$obj->mDepartments[i].telephoneNumber}</td>
							<td>{$obj->mDepartments[i].description}</td>
							<td>
								<input class="tool-button" type="submit" name="submit_edit_cat_{$obj->mDepartments[i].departmentID}" value="Edit Categories" />
								<input class="tool-button edit-button" type="submit" name="submit_edit_dept_{$obj->mDepartments[i].departmentID}" value="Edit" />
								<input class="tool-button delete-button" type="submit" name="submit_delete_dept_{$obj->mDepartments[i].departmentID}" value="Delete" />
							</td>
						</tr>
					{/if}
				{/section}
			</table>
		{/if}
		<div class="subtitle">
			Add new department:
		</div>
		<p class="add-object">
			<input type="text" name="department_name" placeholder="[name]" size="25" />
			<input type="text" name="department_manager" placeholder="[manager]" size="7" />
			<input type="text" name="department_number" placeholder="[telephoneNumber]" size="17" />
			<input type="text" name="department_description" placeholder="[description]" size="55" />
			<input type="submit" name="submit_add_dept_0" value="Add" class="tool-button add-button" />
		</p>
	</form>
