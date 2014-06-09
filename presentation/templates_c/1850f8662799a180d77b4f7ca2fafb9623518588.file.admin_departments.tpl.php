<?php /* Smarty version Smarty-3.1.8, created on 2012-04-21 19:17:38
         compiled from "C:\emart/presentation/templates\admin_departments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96484f837724006238-45644256%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1850f8662799a180d77b4f7ca2fafb9623518588' => 
    array (
      0 => 'C:\\emart/presentation/templates\\admin_departments.tpl',
      1 => 1335028655,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96484f837724006238-45644256',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f83772417aec2_70146510',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f83772417aec2_70146510')) {function content_4f83772417aec2_70146510($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_departments",'assign'=>"obj"),$_smarty_tpl);?>

	<div class="heading">eMart Departments</div>
	<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToDepartmentsAdmin;?>
">
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage){?>
			<div class="errorMessage">
				<?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>

			</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mDepartmentsCount==0){?>
			<div class="noitemsfound">
				There are no departments in your database!
			</div><!-- end noitemsfound -->
		<?php }else{ ?>
			<table class="records">
				<tr>
				<th width="200px">Department Name</th>
				<th width="50px">Manager</th>
				<th width="100px">Tel Number</th>
				<th width="350px">Description</th>
				<th width="160px">Tools</th>
				</tr>
				
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mDepartments) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditItem==$_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['departmentID']){?>
						<tr>
							<td>
								<input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
" size="20" />
							</td>
							<td>
								<input type="text" name="manager" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['manager'];?>
" size="20" />
							</td>
							<td>
								<input type="text" name="number" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['telephoneNumber'];?>
" size="20" />
							</td>
							<td>
								<textarea name="description" rows="3" cols="30"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['description'];?>
</textarea>
							</td>
							<td>
								<input type="submit" name="submit_edit_cat_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['departmentID'];?>
" value="Edit Categories" />
								<input type="submit" name="submit_update_dept_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['departmentID'];?>
" value="Update" />
								<input type="submit" name="cancel" value="Cancel" />
								<input type="submit" name="submit_delete_dept_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['departmentID'];?>
" value="Delete" />
							</td>
						</tr>
					<?php }else{ ?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['manager'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['telephoneNumber'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['description'];?>
</td>
							<td>
								<input type="submit" name="submit_edit_cat_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['departmentID'];?>
" value="Edit Categories" />
								<input type="submit" name="submit_edit_dept_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['departmentID'];?>
" value="Edit" />
								<input type="submit" name="submit_delete_dept_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['departmentID'];?>
" value="Delete" />
							</td>
						</tr>
					<?php }?>
				<?php endfor; endif; ?>
			</table>
		<?php }?>
		<div class="subtitle">
			Add new department:
		</div>
		<p>
			<input type="text" name="department_name" value="[name]" size="25" />
			<input type="text" name="department_manager" value="[manager]" size="7" />
			<input type="text" name="department_number" value="[telephoneNumber]" size="17" />
			<input type="text" name="department_description" value="[description]" size="55" />
			<input type="submit" name="submit_add_dept_0" value="Add" />
		</p>
	</form><?php }} ?>