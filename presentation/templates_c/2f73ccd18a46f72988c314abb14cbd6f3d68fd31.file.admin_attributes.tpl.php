<?php /* Smarty version Smarty-3.1.8, created on 2012-04-21 20:37:05
         compiled from "C:\emart/presentation/templates\admin_attributes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:285124f92fe51a13687-41560732%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f73ccd18a46f72988c314abb14cbd6f3d68fd31' => 
    array (
      0 => 'C:\\emart/presentation/templates\\admin_attributes.tpl',
      1 => 1335029860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '285124f92fe51a13687-41560732',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f92fe51beafe1_07078424',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f92fe51beafe1_07078424')) {function content_4f92fe51beafe1_07078424($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?> 
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_attributes",'assign'=>"obj"),$_smarty_tpl);?>

	<div class="heading">eMart Attributes</div>
	<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAttributesAdmin;?>
">
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage){?>
			<div class="errorMessage">
				<?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>

			</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mAttributesCount==0){?>
			<div class="noitemsfound">
				There are no attributes in your database!
			</div><!-- end noitemsfound -->
		<?php }else{ ?>
			<table class="records">
				<tr>
				<th width="700px">Attribute Name</th>
				<th width="160px">Tools</th>
				</tr>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mAttributes) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditItem==$_smarty_tpl->tpl_vars['obj']->value->mAttributes[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['attributeID']){?>
						<tr>
							<td>
								<input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAttributes[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
" size="30" />
							</td>
							<td>
								<input type="submit" name="submit_edit_val_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAttributes[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['attributeID'];?>
" value="Edit Attribute Values" />
								<input type="submit" name="submit_update_attr_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAttributes[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['attributeID'];?>
" value="Update" />
								<input type="submit" name="cancel" value="Cancel" />
								<input type="submit" name="submit_delete_attr_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAttributes[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['attributeID'];?>
" value="Delete" />
							</td>
						</tr>
					<?php }else{ ?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAttributes[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
</td>
							<td>
								<input type="submit" name="submit_edit_val_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAttributes[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['attributeID'];?>
" value="Edit Attribute Values" />
								<input type="submit" name="submit_edit_attr_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAttributes[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['attributeID'];?>
" value="Edit" />
								<input type="submit" name="submit_delete_attr_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAttributes[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['attributeID'];?>
" value="Delete" />
							</td>
						</tr>
					<?php }?>
				<?php endfor; endif; ?>
			</table>
		<?php }?>
		<div class="subtitle">
			Add new attribute:
		</div>
		<p>
			<input type="text" name="attribute_name" value="[name]" size="30" />
			<input type="submit" name="submit_add_attr_0" value="Add" />
		</p>
	</form><?php }} ?>