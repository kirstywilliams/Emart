{* departments_list.tpl *}
{load_presentation_object filename="departments_list" assign="obj"}

{* Start departments list *}
<div class="box">
	<h4>Choose a Department</h4>
	<div class="box-links">
		{* Loop through the list of departments *}
		{section name=i loop=$obj->mDepartments}
			{assign var=linkselected value=""}
			
			{* Verify if the department is selected to decide what CSS style to use *}
			{if ($obj->mSelectedDepartment == $obj->mDepartments[i].departmentID)}
				{assign var=linkselected value="class=\"linkselected\""}
			{/if}
			
			<div class="link">
				{* Generate a link for a new department in the list *}
				<a {$linkselected} href="{$obj->mDepartments[i].link_to_department}">
				{$obj->mDepartments[i].name}</a>
			</div>
		{/section}
	</div>
</div>