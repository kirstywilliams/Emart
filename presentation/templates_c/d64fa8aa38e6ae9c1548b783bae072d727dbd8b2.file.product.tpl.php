<?php /* Smarty version Smarty-3.1.8, created on 2013-03-15 20:44:25
         compiled from "C:\emart/presentation/templates\product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193064f80f51762a139-44920151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd64fa8aa38e6ae9c1548b783bae072d727dbd8b2' => 
    array (
      0 => 'C:\\emart/presentation/templates\\product.tpl',
      1 => 1363376660,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193064f80f51762a139-44920151',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f80f51778d3a1_88782730',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f80f51778d3a1_88782730')) {function content_4f80f51778d3a1_88782730($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?><?php echo smarty_function_load_presentation_object(array('filename'=>"product",'assign'=>"obj"),$_smarty_tpl);?>

<h2><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['itemName'];?>
</h2>
<div class="standard-table">
	<?php if ($_smarty_tpl->tpl_vars['obj']->value->mStock['bigImage']){?>
		<img class="product-image" src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['bigImage'];?>
"
		alt="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['itemName'];?>
 image" />
	<?php }?>
	<div class="producttext">
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mStock['longDescription']!=''){?>
			<div class="productdescription"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['longDescription'];?>
</div>
		<?php }?>
		
		<div class="productprice">
			<?php if ($_smarty_tpl->tpl_vars['obj']->value->mStock['discountedPrice']!=0){?>
				<span class="old-price">Old Price: &pound<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['price'];?>
<br/></span>
				<span class="price">Price: &pound<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['discountedPrice'];?>
</span>
			<?php }else{ ?>
				<span class="price">Price: &pound<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['price'];?>
</span>
			<?php }?>
		</div>
		
		
		<form class="add-product-form" target="_self" method="post"
					action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['link_to_add_product'];?>
"
					onsubmit="return addProductToCart(this);">
					
			
			<div class="attributes">
				
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['k'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['k']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['name'] = 'k';
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mStock['attributes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total']);
?>
					
					<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['k']['first']||$_smarty_tpl->tpl_vars['obj']->value->mStock['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attribute_name']!==$_smarty_tpl->tpl_vars['obj']->value->mStock['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['k']['index_prev']]['attribute_name']){?>
						<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attribute_name'];?>
:
						<select class="table-input" name="attr_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attribute_name'];?>
">
					<?php }?>
					
					
					<option value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attribute_value'];?>
">
						<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attribute_value'];?>

					</option>
					
					
					<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['k']['last']||$_smarty_tpl->tpl_vars['obj']->value->mStock['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attribute_name']!==$_smarty_tpl->tpl_vars['obj']->value->mStock['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['k']['index_next']]['attribute_name']){?>
						</select>
					<?php }?>
				<?php endfor; endif; ?>
			</div>
			
			
			<p>
            	<br/>
				<input class="button light" type="submit" name="add_to_cart" value="Add to Cart" />
			</p>
		</form>
		
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowEditButton){?>
			<form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEditActionTarget;?>
" target="_self"
			method="post" class="edit-form">
				<div>
					<input class="button light" type="submit" name="submit_edit" value="Edit Product Details" />
				</div>
			</form>
		<?php }?>
	</div>	
	<?php if ($_smarty_tpl->tpl_vars['obj']->value->mLinkToContinueShopping){?>
		<a class="shoppingnav" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToContinueShopping;?>
">Continue Shopping</a>
	<?php }?>
	
	<div class="subtitle">Find similar products in our catalog:</div>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mLocations) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<div class="shoppingnav">
				<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLocations[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['link_to_department'];?>
"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLocations[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['department_name'];?>
</a>
				&raquo;
				<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLocations[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['link_to_category'];?>
"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLocations[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['category_name'];?>
</a>
			</div>
		<?php endfor; endif; ?>
</div><?php }} ?>