{* customer_credit_card.tpl *}
{load_presentation_object filename="customer_credit_card" assign="obj"}
<h3>Please enter your credit card details:</h3>
<form method="post" action="{$obj->mLinkToPaymentDetails}">
	<table class="standard-table">
		<tr>
			<td>Card Holder:</td>
			<td>
				<input type="text" name="cardHolder" size="32"
				value="{$obj->mPlainCreditCard.card_holder}" />
				{if $obj->mCardHolderError}
					<div class="error">You must enter a card holder.</div>
				{/if}
			</td>
		</tr>
		<tr>
			<td>Card Number (digits only):</td>
			<td>
				<input type="text" name="cardNumber" size="32"
				value="{$obj->mPlainCreditCard.card_number}" />
				{if $obj->mCardNumberError}
					<div class="error">You must enter a card number.</div>
				{/if}
			</td>
		</tr>
		<tr>
			<td>Expiry Date (MM/YY):</td>
			<td>
				<input type="text" name="expDate" size="32"
				value="{$obj->mPlainCreditCard.expiry_date}" />
				{if $obj->mExpDateError}
					<div class="error">You must enter an expiry date</div>
				{/if}
			</td>
		</tr>
		<tr>
			<td>Issue Date (MM/YY if applicable):</td>
			<td>
				<input type="text" name="issueDate" size="32"
				value="{$obj->mPlainCreditCard.issue_date}" />
			</td>
		</tr>
		<tr>
			<td>Issue Number (if applicable):</td>
			<td>
				<input type="text" name="issueNumber" size="32"
				value="{$obj->mPlainCreditCard.issue_number}" />
			</td>
		</tr>
		<tr>
			<td>Card Type:</td>
			<td>
				<select style="width:80%;" name="cardType">
				{html_options options=$obj->mCardTypes
				selected=$obj->mPlainCreditCard.card_type}
				</select>
				{if $obj->mCardTypesError}
					<div class="error">You must enter a card type.</div>
				{/if}
			</td>
		</tr>
	</table>
	<div style="text-align:center; margin-top:10px;">
		<input class="button light" type="submit" name="sendit" value="Confirm" /> |
		<a href="{$obj->mLinkToCancelPage}">Cancel</a>
	</div>
</form>