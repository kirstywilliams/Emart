{* admin_categories.tpl *}
{load_presentation_object filename="admin_categories" assign="obj"}
	<div class="innerheading">
		Editing categories for department:
		{$obj->mDepartmentName} [<a href="{$obj->mLinkToDepartmentsAdmin}">back to departments ...</a> ]
	</div>
	<form method="post" action="{$obj->mLinkToDepartmentCategoriesAdmin}">
		{if $obj->mErrorMessage}
			<div class="errorMessage">
				{$obj->mErrorMessage}
			</div>
		{/if}
		{if $obj->mCategoriesCount eq 0}
			<div class="noitemsfound">
				There are no categories in the department!
			</div><!-- end noitemsfound -->
		{else}
			<table class="records">
				<tr>
					<th class="record-values-d2">Category Name</th>
					<th class="record-values-d2">Description</th>
					<th class="record-tools">Tools</th>
				</tr>

				{section name=i loop=$obj->mCategories}
					{if $obj->mEditItem == $obj->mCategories[i].categoryID}
						<tr>
							<td>
								<input type="text" name="name" value="{$obj->mCategories[i].categoryName}" size="25" />
							</td>
							<td>
								{strip}
									<textarea name="description" rows="3" cols="60">
										{$obj->mCategories[i].description}
									</textarea>
								{/strip}
							</td>
							<td>
								<input class="tool-button edit-button" type="submit" name="submit_edit_prod_{$obj->mCategories[i].categoryID}" value="Edit Products" />
								<input class="tool-button save-button" type="submit" name="submit_update_cat_{$obj->mCategories[i].categoryID}" value="Update" />
								<input type="submit" name="cancel" value="Cancel" />
								<input class="tool-button delete-button" type="submit" name="submit_delete_cat_{$obj->mCategories[i].categoryID}" value="Delete" />
							</td>
						</tr>
					{else}
						<tr>
							<td>{$obj->mCategories[i].categoryName}</td>
							<td>{$obj->mCategories[i].description}</td>
							<td>
								<input class="tool-button" type="submit" name="submit_edit_prod_{$obj->mCategories[i].categoryID}" value="Edit Products" />
								<input class="tool-button edit-button" type="submit" name="submit_edit_cat_{$obj->mCategories[i].categoryID}" value="Edit" />
								<input class="tool-button delete-button" type="submit" name="submit_delete_cat_{$obj->mCategories[i].categoryID}" value="Delete" />
							</td>
						</tr>
					{/if}
				{/section}
			</table>
		{/if}
		<div class="subtitle">
			Add new category:
		</div>
		<p class="add-object">
			<input type="text" name="category_name" placeholder="[name]" size="25" />
			<input type="text" name="category_description" placeholder="[description]" size="100" />
			<input type="submit" name="submit_add_cat_0" value="Add" class="tool-button add-button" />
		</p>
	</form>
