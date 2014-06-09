 {* admin_attributes.tpl *}
{load_presentation_object filename="admin_attributes" assign="obj"}
	<div class="heading">eMart Attributes</div>
	<form method="post" action="{$obj->mLinkToAttributesAdmin}">
		{if $obj->mErrorMessage}
			<div class="errorMessage">
				{$obj->mErrorMessage}
			</div>
		{/if}
		{if $obj->mAttributesCount eq 0}
			<div class="noitemsfound">
				There are no attributes in your database!
			</div><!-- end noitemsfound -->
		{else}
			<table class="records">
				<tr>
				<th class="record-values">Attribute Name</th>
				<th class="record-tools">Tools</th>
				</tr>
				{section name=i loop=$obj->mAttributes}
					{if $obj->mEditItem == $obj->mAttributes[i].attributeID}
						<tr>
							<td>
								<input type="text" name="name" value="{$obj->mAttributes[i].name}" size="30" />
							</td>
							<td>
								<input class="tool-button edit-button" type="submit" name="submit_edit_val_{$obj->mAttributes[i].attributeID}" value="Edit Attribute Values" />
								<input class="tool-button save-button" type="submit" name="submit_update_attr_{$obj->mAttributes[i].attributeID}" value="Update" />
								<input class="tool-button" type="submit" name="cancel" value="Cancel" />
								<input class="tool-button delete-button" type="submit" name="submit_delete_attr_{$obj->mAttributes[i].attributeID}" value="Delete" />
							</td>
						</tr>
					{else}
						<tr>
							<td>{$obj->mAttributes[i].name}</td>
							<td>
								<input class="tool-button" type="submit" name="submit_edit_val_{$obj->mAttributes[i].attributeID}" value="Edit Attribute Values" />
								<input class="tool-button edit-button" type="submit" name="submit_edit_attr_{$obj->mAttributes[i].attributeID}" value="Edit" />
								<input class="tool-button delete-button" type="submit" name="submit_delete_attr_{$obj->mAttributes[i].attributeID}" value="Delete" />
							</td>
						</tr>
					{/if}
				{/section}
			</table>
		{/if}
		<div class="subtitle">
			Add new attribute:
		</div>
		<p class="add-object">
			<input type="text" name="attribute_name" placeholder="[name]" size="30" />
			<input type="submit" name="submit_add_attr_0" value="Add" class="tool-button add-button" />
		</p>
	</form>
