{* categories_list.tpl *}
{load_presentation_object filename="categories_list" assign="obj"}

{* Start categories list *}
<div class="box">
	<h4 class="sub-box">Choose a Category</h4>
	<div class="box-links">
		{* Loop through the list of categories *}
		{section name=i loop=$obj->mCategories}
			{assign var=linkselected value=""}
			
			{* Verify if the category is selected to decide what CSS style to use *}
			{if ($obj->mSelectedCategory == $obj->mCategories[i].categoryID)}
				{assign var=linkselected value="class=\"linkselected\""}
			{/if}
			
			<div class="link">
				{* Generate a link for a new category in the list *}
				<a {$linkselected} href="{$obj->mCategories[i].link_to_category}">
				{$obj->mCategories[i].categoryName}
				</a>
			</div>
		{/section}
	</div>
</div>
{* End categories list *}