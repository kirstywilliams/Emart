{* admin_carts.tpl *}
{load_presentation_object filename="admin_carts" assign="obj"}
	<div class="heading">eMart Shopping Carts: </div>
	<form action="{$obj->mLinkToCartsAdmin}" method="post">
		{if $obj->mMessage}
			<div class="errorMessage">
				{$obj->mMessage}
			</div>
		{/if}
		<p>
			Select carts:
			{html_options name="days" options=$obj->mDaysOptions
			selected=$obj->mSelectedDaysNumber}
			<input class="tool-button" type="submit" name="submit_count" value="Count Old Shopping Carts" />
			<input class="tool-button delete-button" type="submit" name="submit_delete" value="Delete Old Shopping Carts" />
		</p>
	</form>
