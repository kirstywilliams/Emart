{* customer_logged.tpl *}
{load_presentation_object filename="customer_logged" assign="obj"}
<div class="box">
	<h3>Welcome, {$obj->mCustomerName} </h3>
	<div>
		<a {if $obj->mSelectedMenuItem eq 'account'} class="selected" {/if}
		href="{$obj->mLinkToAccountDetails}">
		Update Account Details
		</a>
	</div>
	<div>
		<a {if $obj->mSelectedMenuItem eq 'payment-details'} class="selected" {/if}
		href="{$obj->mLinkToPaymentDetails}">
		{$obj->mPaymentAction} Payment Details
		</a>
	</div>
	<div>
		<a href="{$obj->mLinkToLogout}">
		Logout
		</a>
	</div>
</div>