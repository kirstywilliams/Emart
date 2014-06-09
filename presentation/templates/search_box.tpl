{* search_box.tpl *}
{load_presentation_object filename="search_box" assign="obj"}
{* Start search box *}
<div id="search_feature">
	<div id="searchlabel">Search</div>
	<form action="{$obj->mLinkToSearch}" method="post" name="search_form">
		<input id="search_string" name="search_string" value="{$obj->mSearchString}" maxlength="100" />
		<input id="search_button" type="submit" value="GO!" />
		<div id="search_checkbox">
			<input type="checkbox" id="all_words" name="all_words"
			{if $obj->mAllWords == "on"} checked="checked" {/if}/>
			Search for all words
		</div>
	</form>
</div>
{* End search box *}