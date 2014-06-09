{* admin_attribute_values.tpl *}
{load_presentation_object filename="admin_attribute_values" assign="obj"}
	<div class="innerheading">
		Editing attribute values for attribute:
		{$obj->mAttributeName} [<a href="{$obj->mLinkToAttributesAdmin}">back to attributes ...</a> ]
	</div>
	<form method="post" action="{$obj->mLinkToAttributeValuesAdmin}">
		{if $obj->mErrorMessage}
			<div class="errorMessage">
				{$obj->mErrorMessage}
			</div>
		{/if}
		{if $obj->mAttributeValues eq 0}
			<div class="noitemsfound">
				There are no values for this attribute!
			</div><!-- end noitemsfound -->
		{else}
			<table class="records">
				<tr>
					<th class="record-values">Attribute Value</th>
					<th class="record-tools">Tools</th>
				</tr>

				{section name=i loop=$obj->mAttributeValues}
					{if $obj->mEditItem == $obj->mAttributeValues[i].attributeValueID}
						<tr>
							<td>
								<input type="text" name="name" value="{$obj->mAttributeValues[i].value}" size="30" />
							</td>
							<td>
								<input class="tool-button save-button" type="submit" name="submit_update_val_{$obj->mAttributeValues[i].attributeValueID}" value="Update" />
								<input class="tool-button" type="submit" name="cancel" value="Cancel" />
								<input class="tool-button delete-button" type="submit" name="submit_delete_val_{$obj->mAttributeValues[i].attributeValueID}" value="Delete" />
							</td>
						</tr>
					{else}
						<tr>
							<td>{$obj->mAttributeValues[i].value}</td>
							<td>
								<input class="tool-button edit-button" type="submit" name="submit_edit_val_{$obj->mAttributeValues[i].attributeValueID}" value="Edit" />
								<input class="tool-button delete-button" type="submit" name="submit_delete_val_{$obj->mAttributeValues[i].attributeValueID}" value="Delete" />
							</td>
						</tr>
					{/if}
				{/section}
			</table>
		{/if}
		<div class="subtitle">
			Add new attribute value:
		</div>
		<p class="add-object">
			<input type="text" name="attribute_value" placeholder="[value]" size="30" />
			<input type="submit" name="submit_add_val_0" value="Add" class="tool-button add-button" />
		</p>
	</form>
