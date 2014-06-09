<?php /* Smarty version Smarty-3.1.8, created on 2012-05-12 23:02:26
         compiled from "C:\emart/presentation/templates\admin_suppliers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137524faecfe2c861d9-42304072%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3783d42bae1b83c7abdfa4f9c83c21382ec55e6f' => 
    array (
      0 => 'C:\\emart/presentation/templates\\admin_suppliers.tpl',
      1 => 1336856470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137524faecfe2c861d9-42304072',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4faecfe2eb5013_56419420',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4faecfe2eb5013_56419420')) {function content_4faecfe2eb5013_56419420($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_suppliers",'assign'=>"obj"),$_smarty_tpl);?>

	<div class="heading">eMart Suppliers</div>
	<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToSuppliersAdmin;?>
">
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage){?>
			<div class="errorMessage">
				<?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>

			</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mSuppliersCount==0){?>
			<div class="noitemsfound">
				There are no suppliers in the database!
			</div><!-- end noitemsfound -->
		<?php }else{ ?>
			<table class="records">
				<tr>
				<th width="350px">Name</th>
				<th width="350px">Email</th>
				<th width="160px">Tools</th>
				</tr>
				
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mSuppliers) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mSuppliers[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['supplierName'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mSuppliers[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['emailAddress'];?>
</td>
						<td>
							<input type="submit" name="submit_edit_supp_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSuppliers[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['supplierID'];?>
" value="View Details" />
						</td>
					</tr>
				<?php endfor; endif; ?>
			</table>
		<?php }?>
		<div class="subtitle">
			Add new supplier:
		</div>
		<p>
			<input type="text" name="supplier_name" value="[company name]" size="25" />
			<input type="text" name="supplier_email" value="[email address]" size="25" />
			<input type="text" name="supplier_telephone" value="[telephone number]" size="20" />
			<input type="text" name="supplier_address_line_one" value="[street address]" size="25" />
			<input type="text" name="supplier_town" value="[town]" size="25" />
			<input type="text" name="supplier_city" value="[city]" size="25" />
			<input type="text" name="supplier_county" value="[county]" size="20" />
			<input type="text" name="supplier_postcode" value="[postcode]" size="8" />
			<input type="submit" name="submit_add_supp_0" value="Add" />
		</p>
	</form><?php }} ?>