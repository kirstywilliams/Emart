<?php /* Smarty version Smarty-3.1.8, created on 2012-05-15 16:24:12
         compiled from "C:\emart/presentation/templates\admin_products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:255804f9326d686fa93-13143554%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4317f86610028b8f7b7da7ccaf6ce7e390dc59ff' => 
    array (
      0 => 'C:\\emart/presentation/templates\\admin_products.tpl',
      1 => 1337003447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '255804f9326d686fa93-13143554',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f9326d6aa1804_30292867',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f9326d6aa1804_30292867')) {function content_4f9326d6aa1804_30292867($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_products",'assign'=>"obj"),$_smarty_tpl);?>

	<div class="innerheading">
		Editing products for category: 
		<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCategoryName;?>
 [<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToDepartmentCategoriesAdmin;?>
">back to categories ...</a> ]
	</div>
	<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCategoryProductsAdmin;?>
">
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage){?>
			<div class="errorMessage">
				<?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>

			</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mProductsCount==0){?>
			<div class="noitemsfound">
				There are no products in this category!
			</div><!-- end noitemsfound -->
		<?php }else{ ?>
			<table class="records">
				<tr>
				<th width="200px">Name</th>
				<th width="200px">Brief Description</th>
				<th width="200px">Long Description</th>
				<th width="50px">Price</th>
				<th width="50px">Discounted Price</th>
				<th width="160px">Tools</th>
				</tr>
				
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mStock) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['itemName'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['briefDescription'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['longDescription'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['price'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['discountedPrice'];?>
</td>
						<td>
							<input type="submit" name="submit_edit_prod_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['itemID'];?>
" value="Edit" />
						</td>
					</tr>
				<?php endfor; endif; ?>
			</table>
		<?php }?>
		<div class="subtitle">
			Add new product:
		</div>
		<p>
			<input type="text" name="product_name" value="[name]" size="25" />
			<input type="text" name="product_brief_description" value="[brief description]" size="25" />
			<input type="text" name="product_long_description" value="[long description]" size="55" />
			<input type="text" name="product_price" value="[price]" size="7" />
			<input type="text" name="current_qty" value="[current quantity]" size="25" />
			<input type="text" name="ideal_qty" value="[ideal quantity]" size="25" />
			<input type="submit" name="submit_add_prod_0" value="Add" />
		</p>
	</form><?php }} ?>