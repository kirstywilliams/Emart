<?php /* Smarty version Smarty-3.1.8, created on 2012-05-12 20:29:42
         compiled from "C:\emart/presentation/templates\admin_customers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124694fae507da64c44-62841073%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7f41da3ff0484241deab94cad9f312a7a67aef7' => 
    array (
      0 => 'C:\\emart/presentation/templates\\admin_customers.tpl',
      1 => 1336847379,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124694fae507da64c44-62841073',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fae507dc97633_32316697',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fae507dc97633_32316697')) {function content_4fae507dc97633_32316697($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_customers",'assign'=>"obj"),$_smarty_tpl);?>

	<div class="heading">eMart Customers</div>
	<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCustomersAdmin;?>
">
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage){?>
			<div class="errorMessage">
				<?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>

			</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mCustomersCount==0){?>
			<div class="noitemsfound">
				There are no customers in the database!
			</div><!-- end noitemsfound -->
		<?php }else{ ?>
			<table class="records">
				<tr>
				<th width="225px">First Name</th>
				<th width="225px">Surname</th>
				<th width="250px">Email</th>
				<th width="160px">Tools</th>
				</tr>
				
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
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['firstname'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['surname'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['emailAddress'];?>
</td>
						<td>
							<input type="submit" name="submit_edit_cust_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['customerID'];?>
" value="View Details" />
						</td>
					</tr>
				<?php endfor; endif; ?>
			</table>
		<?php }?>
		<div class="subtitle">
			Add new customer:
		</div>
		<p>
			<input type="text" name="customer_first_name" value="[first name]" size="25" />
			<input type="text" name="customer_surname" value="[surname]" size="25" />
			<input type="text" name="customer_email" value="[email address]" size="25" />
			<input type="text" name="customer_password" value="[password]" size="20" />
			<input type="text" name="customer_telephone" value="[telephone number]" size="20" />
			<input type="text" name="customer_address_line_one" value="[street address]" size="25" />
			<input type="text" name="customer_town" value="[town]" size="25" />
			<input type="text" name="customer_city" value="[city]" size="25" />
			<input type="text" name="customer_county" value="[county]" size="20" />
			<input type="text" name="customer_postcode" value="[postcode]" size="8" />
			<input type="submit" name="submit_add_cust_0" value="Add" />
		</p>
	</form><?php }} ?>