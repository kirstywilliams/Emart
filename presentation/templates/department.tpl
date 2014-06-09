{* department.tpl *}
{load_presentation_object filename="department" assign="obj"}
<h2>{$obj->mName}</h2><br/>
<div id="bolded-line"></div>
<span>{$obj->mDescription}</span>
{if $obj->mShowEditButton}
	<form action="{$obj->mEditActionTarget}" method="post" class="edit-form">
		<input class="button light" type="submit" name="submit_{$obj->mEditAction}"
		value="{$obj->mEditButtonCaption}" />
	</form>
{/if}
{include file="products_list.tpl"}