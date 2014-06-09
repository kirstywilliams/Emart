 {* products_list.tpl *}
{load_presentation_object filename="products_list" assign="obj"}
{if count($obj->mProductListPages) > 0}
	<div class="pagenumbers">
		{if $obj->mLinkToPreviousPage}
			<a style="text-decoration:underline" 
			href="{$obj->mLinkToPreviousPage}">Previous page</a>
		{/if}
		{section name=m loop=$obj->mProductListPages}
			{if $obj->mPage eq $smarty.section.m.index_next}
				<strong>{$smarty.section.m.index_next}</strong>
			{else}
				<a style="text-decoration:underline" 
				href="{$obj->mProductListPages[m]}">
				{$smarty.section.m.index_next}</a>
			{/if}
		{/section}
		
		{if $obj->mLinkToNextPage}
			<a style="text-decoration:underline" 
			href="{$obj->mLinkToNextPage}">Next page</a>
		{/if}
	</div>
{/if}



{if $obj->mStock}  
    
	<table class="pricing-table" border="0">
		<tbody>
			{section name=k loop=$obj->mStock}
				{if $smarty.section.k.index % 2 == 0}
					<tr>
				{/if}
				<td valign="top">
                	<div class="two-tables">
    					<div class="pricing-table">
							<div class="color-1">
                                <h3>
                                    <a href="{$obj->mStock[k].link_to_product}">
                                    {$obj->mStock[k].itemName}
                                    </a>
                                </h3>
                                <div class="price-table-row">
                                    {if $obj->mStock[k].thumbImage neq ""}
                                        <a href="{$obj->mStock[k].link_to_product}">
                                        <img class="image-center" src="{$obj->mStock[k].thumbImage}"
                                        alt="{$obj->mStock[k].itemName}" />
                                        </a>
                                    {/if}
                                    {$obj->mStock[k].briefDescription}
                                </div>
                                <div class="price-table-row">
                                    {if $obj->mStock[k].discountedPrice != 0}
                                        <span class="old-price">Old price: &pound{$obj->mStock[k].price}
                                        </span>
                                        <span class="price">Price: &pound{$obj->mStock[k].discountedPrice}
                                        </span>
                                    {else}
                                        <span class="price">Price: &pound{$obj->mStock[k].price}
                                        </span>
                                    {/if}
                                </div>
                                
                                {* The Add to Cart form *}
                                <form class="add-product-form" target="_self" method="post"
                                action="{$obj->mStock[k].link_to_add_product}"
                                onsubmit="return addProductToCart(this);">
                                
                                    {* Generate the list of attribute values *}
                                    <div class="price-table-row">
                                        {* Parse the list of attributes and attribute values *}
                                        {section name=l loop=$obj->mStock[k].attributes}
                                            {* Generate a new select tag? *}
                                            {if $smarty.section.l.first ||
                                            $obj->mStock[k].attributes[l].attribute_name !==
                                            $obj->mStock[k].attributes[l.index_prev].attribute_name}
                                                <div class="price-table-element">{$obj->mStock[k].attributes[l].attribute_name}:</div>
                                                <select class="te-opt" name="attr_{$obj->mStock[k].attributes[l].attribute_name}">
                                            {/if}
                                            
                                            {* Generate a new option tag *}
                                            <option value="{$obj->mStock[k].attributes[l].attribute_value}">
                                                {$obj->mStock[k].attributes[l].attribute_value}
                                            </option>
                                            
                                            {* Close the select tag? *}
                                            {if $smarty.section.l.last ||
                                                $obj->mStock[k].attributes[l].attribute_name !==
                                                $obj->mStock[k].attributes[l.index_next].attribute_name}
                                                </select>
                                            {/if}
                                        {/section}
                                    </div>
                                    
                                    {* Add the submit button and close the form *}
                                    <p>
                                        <input class="button light" type="submit" name="add_to_cart" value="Add to Cart" />
                                    </p>
                                </form>
                            
                                {* Show Edit button for administrators *}
                                {if $obj->mShowEditButton}
                                    <form action="{$obj->mEditActionTarget}" target="_self" method="post" class="edit-form">
                                        <input class="button light" type="hidden" name="itemID" value="{$obj->mStock[k].itemID}" />
                                        <input class="button light" type="submit" name="submit" value="Edit Product Details" />
                                    </form>
                                {/if}
                            </div>
                        </div>     
                	</div>
        		</td>
            	{if $smarty.section.k.index % 2 != 0 && !$smarty.section.k.first || $smarty.section.k.last}
            		</tr>
            	{/if}
			{/section}
		</tbody>
	</table>
{/if}

{if $obj->mrTotalPages > 1}
	<div class="pagenumbers">
        Page {$obj->mPage} of {$obj->mrTotalPages}
        <br/>
        {if $obj->mLinkToPreviousPage}
            <a style="text-decoration:underline" href="{$obj->mLinkToPreviousPage}">Previous</a>
        {else}
            Previous
        {/if}
    
        {if $obj->mLinkToNextPage}
            <a style="text-decoration:underline" href="{$obj->mLinkToNextPage}">Next</a>
        {else}
            Next
        {/if}
	</div>	
{/if}