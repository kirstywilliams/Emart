<?php /* Smarty version Smarty-3.1.8, created on 2013-03-15 19:47:04
         compiled from "C:\emart/presentation/templates\products_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:265934f80c46b0c5b24-10559820%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6cfbc8afca4f2e76bbbd8c6a49cb6c69bf2c0b0' => 
    array (
      0 => 'C:\\emart/presentation/templates\\products_list.tpl',
      1 => 1363372769,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '265934f80c46b0c5b24-10559820',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f80c46b21a5d5_85431741',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f80c46b21a5d5_85431741')) {function content_4f80c46b21a5d5_85431741($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?> 
<?php echo smarty_function_load_presentation_object(array('filename'=>"products_list",'assign'=>"obj"),$_smarty_tpl);?>

<?php if (count($_smarty_tpl->tpl_vars['obj']->value->mProductListPages)>0){?>
	<div class="pagenumbers">
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mLinkToPreviousPage){?>
			<a style="text-decoration:underline" 
			href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToPreviousPage;?>
">Previous page</a>
		<?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['m'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['m']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['name'] = 'm';
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mProductListPages) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total']);
?>
			<?php if ($_smarty_tpl->tpl_vars['obj']->value->mPage==$_smarty_tpl->getVariable('smarty')->value['section']['m']['index_next']){?>
				<strong><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['m']['index_next'];?>
</strong>
			<?php }else{ ?>
				<a style="text-decoration:underline" 
				href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProductListPages[$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']];?>
">
				<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['m']['index_next'];?>
</a>
			<?php }?>
		<?php endfor; endif; ?>
		
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mLinkToNextPage){?>
			<a style="text-decoration:underline" 
			href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToNextPage;?>
">Next page</a>
		<?php }?>
	</div>
<?php }?>



<?php if ($_smarty_tpl->tpl_vars['obj']->value->mStock){?>  
    
	<table class="pricing-table" border="0">
		<tbody>
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['k'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['k']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['name'] = 'k';
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mStock) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['k']['index']%2==0){?>
					<tr>
				<?php }?>
				<td valign="top">
                	<div class="two-tables">
    					<div class="pricing-table">
							<div class="color-1">
                                <h3>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['link_to_product'];?>
">
                                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['itemName'];?>

                                    </a>
                                </h3>
                                <div class="price-table-row">
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['thumbImage']!=''){?>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['link_to_product'];?>
">
                                        <img class="image-center" src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['thumbImage'];?>
"
                                        alt="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['itemName'];?>
" />
                                        </a>
                                    <?php }?>
                                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['briefDescription'];?>

                                </div>
                                <div class="price-table-row">
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['discountedPrice']!=0){?>
                                        <span class="old-price">Old price: &pound<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['price'];?>

                                        </span>
                                        <span class="price">Price: &pound<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['discountedPrice'];?>

                                        </span>
                                    <?php }else{ ?>
                                        <span class="price">Price: &pound<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['price'];?>

                                        </span>
                                    <?php }?>
                                </div>
                                
                                
                                <form class="add-product-form" target="_self" method="post"
                                action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['link_to_add_product'];?>
"
                                onsubmit="return addProductToCart(this);">
                                
                                    
                                    <div class="price-table-row">
                                        
                                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['l'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['l']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['name'] = 'l';
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attributes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total']);
?>
                                            
                                            <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['l']['first']||$_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index']]['attribute_name']!==$_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index_prev']]['attribute_name']){?>
                                                <div class="price-table-element"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index']]['attribute_name'];?>
:</div>
                                                <select class="te-opt" name="attr_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index']]['attribute_name'];?>
">
                                            <?php }?>
                                            
                                            
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index']]['attribute_value'];?>
">
                                                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index']]['attribute_value'];?>

                                            </option>
                                            
                                            
                                            <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['l']['last']||$_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index']]['attribute_name']!==$_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index_next']]['attribute_name']){?>
                                                </select>
                                            <?php }?>
                                        <?php endfor; endif; ?>
                                    </div>
                                    
                                    
                                    <p>
                                        <input class="button light" type="submit" name="add_to_cart" value="Add to Cart" />
                                    </p>
                                </form>
                            
                                
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowEditButton){?>
                                    <form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEditActionTarget;?>
" target="_self" method="post" class="edit-form">
                                        <input class="button light" type="hidden" name="itemID" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['itemID'];?>
" />
                                        <input class="button light" type="submit" name="submit" value="Edit Product Details" />
                                    </form>
                                <?php }?>
                            </div>
                        </div>     
                	</div>
        		</td>
            	<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['k']['index']%2!=0&&!$_smarty_tpl->getVariable('smarty')->value['section']['k']['first']||$_smarty_tpl->getVariable('smarty')->value['section']['k']['last']){?>
            		</tr>
            	<?php }?>
			<?php endfor; endif; ?>
		</tbody>
	</table>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['obj']->value->mrTotalPages>1){?>
	<div class="pagenumbers">
        Page <?php echo $_smarty_tpl->tpl_vars['obj']->value->mPage;?>
 of <?php echo $_smarty_tpl->tpl_vars['obj']->value->mrTotalPages;?>

        <br/>
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mLinkToPreviousPage){?>
            <a style="text-decoration:underline" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToPreviousPage;?>
">Previous</a>
        <?php }else{ ?>
            Previous
        <?php }?>
    
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mLinkToNextPage){?>
            <a style="text-decoration:underline" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToNextPage;?>
">Next</a>
        <?php }else{ ?>
            Next
        <?php }?>
	</div>	
<?php }?><?php }} ?>