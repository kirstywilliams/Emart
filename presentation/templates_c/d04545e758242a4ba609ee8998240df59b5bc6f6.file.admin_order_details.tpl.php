<?php /* Smarty version Smarty-3.1.8, created on 2012-05-07 04:05:09
         compiled from "C:\emart/presentation/templates\admin_order_details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:248934f9e89034c9e79-11688194%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd04545e758242a4ba609ee8998240df59b5bc6f6' => 
    array (
      0 => 'C:\\emart/presentation/templates\\admin_order_details.tpl',
      1 => 1336356305,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '248934f9e89034c9e79-11688194',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f9e89039421e8_62336630',
  'variables' => 
  array (
    'obj' => 0,
    'selected' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f9e89039421e8_62336630')) {function content_4f9e89039421e8_62336630($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\\emart/libs/smarty/plugins\\modifier.date_format.php';
if (!is_callable('smarty_function_html_options')) include 'C:\\emart/libs/smarty/plugins\\function.html_options.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_order_details",'assign'=>"obj"),$_smarty_tpl);?>

	<div class="innerheading">
		Editing details for order ID: <?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['orderID'];?>
 [
		<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToOrdersAdmin;?>
">back to admin orders...</a> ]
	</div>
	<form method="get" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdmin;?>
">
		<input type="hidden" name="Page" value="OrderDetails" />
		<input type="hidden" name="OrderId" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['orderID'];?>
" />
		<table class="borderless-records">
			<tr>
				<td class="bold-text">Total Amount: </td>
				<td class="price">
					&pound<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['totalAmount'];?>

				</td>
			</tr>
			<tr>
				<td class="bold-text">Shipping: </td>
				<td class="price"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['shippingType'];?>
</td>
			</tr>
			<tr>
				<td class="bold-text">Date Created: </td>
				<td>
					<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['createdOn'],"%Y-%m-%d %T");?>

				</td>
			</tr>
			<tr>
				<td class="bold-text">Date Shipped: </td>
				<td>
					<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['shippedOn'],"%Y-%m-%d %T");?>

				</td>
			</tr>
			<tr>
				<td class="bold-text">Status: </td>
				<td>
				<select name="status" <?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled){?> disabled="disabled" <?php }?>" >
					<?php if ($_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['orderStatus']=='Received'){?>
						<?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable(0, null, 0);?>
					<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['orderStatus']=='Checking Funds'){?>
						<?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable(1, null, 0);?>
					<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['orderStatus']=='Notifying Stock Check'){?>
						<?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable(2, null, 0);?>
					<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['orderStatus']=='Awaiting Stock Confirmation'){?>
						<?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable(3, null, 0);?>
					<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['orderStatus']=='Awaiting Payment'){?>
						<?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable(4, null, 0);?>
					<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['orderStatus']=='Notifying Warehouse Despatch'){?>
						<?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable(5, null, 0);?>
					<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['orderStatus']=='Awaiting Despatch Confirmation'){?>
						<?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable(6, null, 0);?>
					<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['orderStatus']=='Notifying Customer'){?>
						<?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable(7, null, 0);?>	
					<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['orderStatus']=='Complete'){?>
						<?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable(8, null, 0);?>
					<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['orderStatus']=='Cancelled'){?>
						<?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable(9, null, 0);?>
					<?php }?>
			
					<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['obj']->value->mOrderStatusOptions,'selected'=>$_smarty_tpl->tpl_vars['selected']->value),$_smarty_tpl);?>

				</select>
				</td>
			</tr>
			<tr>
				<td class="bold-text">Authorization Code: </td>
				<td>
					<input name="authCode" type="text" size="50"
					value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['authCode'];?>
"
					<?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled){?> disabled="disabled" <?php }?> />
				<td>
			</tr>
			<tr>
				<td class="bold-text">Reference Number: </td>
				<td>
					<input name="reference" type="text" size="50"
					value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['reference'];?>
"
					<?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled){?> disabled="disabled" <?php }?> />
				<td>
			</tr>
			<tr>
				<td class="bold-text">Comments: <br/><br/></td>
				<td>
					<input name="comments" type="text" size="50"
					value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['comments'];?>
"
					<?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled){?> disabled="disabled" <?php }?> /><br/><br/>
				<td>
			</tr>
			<tr>
				<td class="bold-text">Customer Name: <br/><br/></td>
				<td>
					<input name="customerFirstName" type="text" size="50"
					value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['firstname'];?>
"
					<?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled){?> disabled="disabled" <?php }?> /><br/>
					
					<input name="customerSurname" type="text" size="50"
					value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['surname'];?>
"
					<?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled){?> disabled="disabled" <?php }?> /><br/><br/>
				</td>
			</tr>
			<tr>
				<td class="bold-text"><div style="float:left">Shipping Address: </div>
				<div style="float:right;text-align:right;margin-right:10px" width="50%">
				Street<br/>
				Town<br/>
				City<br/>
				County<br/>
				Postcode<br/><br/>
				</div></td>
				<td>
					<input name="addressLineOne" type="text" size="50"
					value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['addressLineOne'];?>
"
					<?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled){?> disabled="disabled" <?php }?> /><br/>
					
					<input name="addressTown" type="text" size="50"
					value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['town'];?>
"
					<?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled){?> disabled="disabled" <?php }?> /><br/>
					
					<input name="addressCity" type="text" size="50"
					value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['city'];?>
"
					<?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled){?> disabled="disabled" <?php }?> /><br/>
					
					<input name="addressCounty" type="text" size="50"
					value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['county'];?>
"
					<?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled){?> disabled="disabled" <?php }?> /><br/>
					
					<input name="addressPostCode" type="text" size="25"
					value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['postcode'];?>
"
					<?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled){?> disabled="disabled" <?php }?> /><br/><br/>
				</td>
			</tr>
			<tr>
				<td class="bold-text">Customer Email: <br/>Telephone Number:<br/></td>
				<td>
					<input name="customerEmail" type="text" size="30"
					value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['emailAddress'];?>
"
					<?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled){?> disabled="disabled" <?php }?> /><br/><br/>
					
					<input name="customerTelephone" type="text" size="30"
					value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['telephoneNumber'];?>
"
					<?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled){?> disabled="disabled" <?php }?> /><br/><br/>
				</td>
			</tr>
		</table>
		
		<div class="borderless-records">
			<br/>
			<input type="submit" name="submitEdit" value="Edit"
			<?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditEnabled){?> disabled="disabled" <?php }?> />
			<input type="submit" name="submitUpdate" value="Update"
			<?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled){?> disabled="disabled" <?php }?> />
			<input type="submit" name="submitCancel" value="Cancel"
			<?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled){?> disabled="disabled" <?php }?> />
			<?php if ($_smarty_tpl->tpl_vars['obj']->value->mProcessButtonText){?>
				<input type="submit" name="submitProcessOrder"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProcessButtonText;?>
" />
			<?php }?>
			<br/><br/>
		</div>
		<br/><div class="subtitle">Order contains these products:</div>
		<table class="records">
			<tr>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Quantity</th>
				<th>Unit Cost</th>
				<th>Subtotal</th>
			</tr>
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mOrderDetails) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderDetails[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['itemID'];?>
</td>
					<td>
						<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderDetails[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['itemName'];?>
<br/>
						<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderDetails[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['attributes'];?>

					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderDetails[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['orderQuantity'];?>
</td>
					<td>&pound<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderDetails[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['price'];?>
</td>
					<td>&pound<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderDetails[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['subtotal'];?>
</td>
				</tr>
			<?php endfor; endif; ?>
		</table>
		<h3>Order audit trail:</h3>
		<table class="records">
			<tr>
				<th>Audit ID</th>
				<th>Created On</th>
				<th>Code</th>
				<th>Message</th>
			</tr>
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['j'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mAuditTrail) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAuditTrail[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['audit_id'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAuditTrail[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['created_on'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAuditTrail[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['code'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAuditTrail[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['message'];?>
</td>
				</tr>
			<?php endfor; endif; ?>
		</table>
	</form><?php }} ?>