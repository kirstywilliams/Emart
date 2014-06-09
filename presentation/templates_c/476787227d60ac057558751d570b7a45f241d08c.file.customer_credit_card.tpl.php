<?php /* Smarty version Smarty-3.1.8, created on 2013-03-15 20:19:26
         compiled from "C:\emart/presentation/templates\customer_credit_card.tpl" */ ?>
<?php /*%%SmartyHeaderCode:227174fa048a80580d0-70676093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '476787227d60ac057558751d570b7a45f241d08c' => 
    array (
      0 => 'C:\\emart/presentation/templates\\customer_credit_card.tpl',
      1 => 1363375163,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '227174fa048a80580d0-70676093',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fa048a82cdf97_36871979',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa048a82cdf97_36871979')) {function content_4fa048a82cdf97_36871979($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
if (!is_callable('smarty_function_html_options')) include 'C:\\emart/libs/smarty/plugins\\function.html_options.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"customer_credit_card",'assign'=>"obj"),$_smarty_tpl);?>

<h3>Please enter your credit card details:</h3>
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToPaymentDetails;?>
">
	<table class="standard-table">
		<tr>
			<td>Card Holder:</td>
			<td>
				<input type="text" name="cardHolder" size="32"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPlainCreditCard['card_holder'];?>
" />
				<?php if ($_smarty_tpl->tpl_vars['obj']->value->mCardHolderError){?>
					<div class="error">You must enter a card holder.</div>
				<?php }?>
			</td>
		</tr>
		<tr>
			<td>Card Number (digits only):</td>
			<td>
				<input type="text" name="cardNumber" size="32"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPlainCreditCard['card_number'];?>
" />
				<?php if ($_smarty_tpl->tpl_vars['obj']->value->mCardNumberError){?>
					<div class="error">You must enter a card number.</div>
				<?php }?>
			</td>
		</tr>
		<tr>
			<td>Expiry Date (MM/YY):</td>
			<td>
				<input type="text" name="expDate" size="32"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPlainCreditCard['expiry_date'];?>
" />
				<?php if ($_smarty_tpl->tpl_vars['obj']->value->mExpDateError){?>
					<div class="error">You must enter an expiry date</div>
				<?php }?>
			</td>
		</tr>
		<tr>
			<td>Issue Date (MM/YY if applicable):</td>
			<td>
				<input type="text" name="issueDate" size="32"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPlainCreditCard['issue_date'];?>
" />
			</td>
		</tr>
		<tr>
			<td>Issue Number (if applicable):</td>
			<td>
				<input type="text" name="issueNumber" size="32"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPlainCreditCard['issue_number'];?>
" />
			</td>
		</tr>
		<tr>
			<td>Card Type:</td>
			<td>
				<select style="width:80%;" name="cardType">
				<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['obj']->value->mCardTypes,'selected'=>$_smarty_tpl->tpl_vars['obj']->value->mPlainCreditCard['card_type']),$_smarty_tpl);?>

				</select>
				<?php if ($_smarty_tpl->tpl_vars['obj']->value->mCardTypesError){?>
					<div class="error">You must enter a card type.</div>
				<?php }?>
			</td>
		</tr>
	</table>
	<div style="text-align:center; margin-top:10px;">
		<input class="button light" type="submit" name="sendit" value="Confirm" /> |
		<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCancelPage;?>
">Cancel</a>
	</div>
</form><?php }} ?>