<?php /* Smarty version Smarty-3.1.8, created on 2012-05-07 03:50:00
         compiled from "C:\emart/presentation/templates\admin_orders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204564f9c30b1d98101-78858147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c37abada288030bf8e691033ef44c5fcef60a01' => 
    array (
      0 => 'C:\\emart/presentation/templates\\admin_orders.tpl',
      1 => 1336355212,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204564f9c30b1d98101-78858147',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f9c30b2173966_96550515',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f9c30b2173966_96550515')) {function content_4f9c30b2173966_96550515($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
if (!is_callable('smarty_function_html_options')) include 'C:\\emart/libs/smarty/plugins\\function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\\emart/libs/smarty/plugins\\modifier.date_format.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_orders",'assign'=>"obj"),$_smarty_tpl);?>

	<div class="heading">eMart Orders</div>
	<form method="get" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdmin;?>
">
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage){?>
			<div class="errorMessage">
				<?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>

			</div>
		<?php }?>
		<input name="Page" type="hidden" value="Orders" />
		<p>
			<font class="bold-text">Show orders by customer</font>
			<select name="customer_id">
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mCustomers) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<option value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['customerID'];?>
"
				<?php if ($_smarty_tpl->tpl_vars['obj']->value->mCustomers[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['customerID']==$_smarty_tpl->tpl_vars['obj']->value->mCustomerId){?>
				selected="selected" <?php }?>>
				<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['surname'];?>

				</option>
			<?php endfor; endif; ?>
			</select>
			<input type="submit" name="submitByCustomer" value="Go!" />
		</p>
		<p>
			<font class="bold-text">Get by order ID</font>
			<input name="orderId" type="text" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderId;?>
" />
			<input type="submit" name="submitByOrderId" value="Go!" />
		</p>
		<p>
			<font class="bold-text">Show the most recent</font>
			<input name="recordCount" type="text" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mRecordCount;?>
" />
			<font class="bold-text">orders</font>
			<input type="submit" name="submitMostRecent" value="Go!" />
		</p>
		<p>
			<font class="bold-text">Show all records created between</font>
			<input name="startDate" type="text" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStartDate;?>
" />
			<font class="bold-text">and</font>
			<input name="endDate" type="text" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEndDate;?>
" />
			<input type="submit" name="submitBetweenDates" value="Go!" />
		</p>
		<p>
			<font class="bold-text">Show orders by status</font>
			<?php echo smarty_function_html_options(array('name'=>"status",'options'=>$_smarty_tpl->tpl_vars['obj']->value->mOrderStatusOptions,'selected'=>$_smarty_tpl->tpl_vars['obj']->value->mSelectedStatus),$_smarty_tpl);?>

			<input type="submit" name="submitOrdersByStatus" value="Go!" />
		</p>
	</form>
	<?php if ($_smarty_tpl->tpl_vars['obj']->value->mOrders){?>
		<table class="records">
			<tr>
				<th>Order ID</th>
				<th>Date Created</th>
				<th>Date Shipped</th>
				<th>Status</th>
				<th>Customer</th>
				<th>Tools</th>
			</tr>
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mOrders) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<?php $_smarty_tpl->tpl_vars['status'] = new Smarty_variable($_smarty_tpl->tpl_vars['obj']->value->mOrders[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['orderStatus'], null, 0);?>
				<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrders[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['orderID'];?>
</td>
				<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['obj']->value->mOrders[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['createdOn'],"%Y-%m-%d %T");?>
</td>
				<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['obj']->value->mOrders[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shippedOn'],"%Y-%m-%d %T");?>
</td>
				<?php if ($_smarty_tpl->tpl_vars['obj']->value->mOrders[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['orderStatus']=='Received'){?>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderStatusOptions[0];?>
</td>
				<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mOrders[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['orderStatus']=='Checking Funds'){?>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderStatusOptions[1];?>
</td>
				<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mOrders[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['orderStatus']=='Notifying Stock Check'){?>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderStatusOptions[2];?>
</td>
				<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mOrders[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['orderStatus']=='Awaiting Stock Confirmation'){?>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderStatusOptions[3];?>
</td>
				<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mOrders[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['orderStatus']=='Awaiting Payment'){?>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderStatusOptions[4];?>
</td>
				<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mOrders[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['orderStatus']=='Notifying Warehouse Despatch'){?>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderStatusOptions[5];?>
</td>
				<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mOrders[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['orderStatus']=='Awaiting Despatch Confirmation'){?>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderStatusOptions[6];?>
</td>
				<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mOrders[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['orderStatus']=='Notifying Customer'){?>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderStatusOptions[7];?>
</td>
				<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mOrders[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['orderStatus']=='Complete'){?>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderStatusOptions[8];?>
</td>
				<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mOrders[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['orderStatus']=='Cancelled'){?>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderStatusOptions[9];?>
</td>
				<?php }?>
				<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrders[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrders[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['surname'];?>
</td>
				<td align="right">
					<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrders[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['link_to_order_details_admin'];?>
">View Details</a>
				</td>
				</tr>
			<?php endfor; endif; ?>
		</table>
	<?php }?><?php }} ?>