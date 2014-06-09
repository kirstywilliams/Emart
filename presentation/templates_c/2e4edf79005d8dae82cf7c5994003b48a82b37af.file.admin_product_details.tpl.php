<?php /* Smarty version Smarty-3.1.8, created on 2012-04-30 15:35:57
         compiled from "C:\emart/presentation/templates\admin_product_details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23264f933cbc3b7aa7-47545680%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e4edf79005d8dae82cf7c5994003b48a82b37af' => 
    array (
      0 => 'C:\\emart/presentation/templates\\admin_product_details.tpl',
      1 => 1335792823,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23264f933cbc3b7aa7-47545680',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f933cbc69a101_46059686',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f933cbc69a101_46059686')) {function content_4f933cbc69a101_46059686($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
if (!is_callable('smarty_function_html_options')) include 'C:\\emart/libs/smarty/plugins\\function.html_options.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_product_details",'assign'=>"obj"),$_smarty_tpl);?>

<form enctype="multipart/form-data" method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToProductDetailsAdmin;?>
">
	<div class="innerheading">
		Editing product: ID #<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['itemID'];?>
 &mdash;
		<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['itemName'];?>
 [<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCategoryProductsAdmin;?>
">back to products ...</a> ]
	</div>
	<?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage){?><div class="errorMessage"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>
</div><?php }?>
	<table class="borderless-records">
		<tbody>
			<tr>
				<td class="leftEdit" valign="top">
					<div class="bold-text">
						Product name:
					</div>
					<div>
						<input type="text" name="name"
						value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['itemName'];?>
" size="30" />
					</div>
					<div class="bold-text">
						Product brief description:
					</div>
					<div>
						<textarea name="briefDescription" rows="3" cols="40"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['briefDescription'];?>
</textarea>
					</div>
					<div class="bold-text">
						Product long description:
					</div>
					<div>
						<textarea name="longDescription" rows="8" cols="40"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['longDescription'];?>
</textarea>
					</div>
					<div class="bold-text">
						Product supplier:
					</div>
					<div>
						<input type="text" name="supplier"
						value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['supplierID'];?>
" size="5" />
					</div>
					<div class="bold-text">
						Product price:
					</div>
					<div>
						<input type="text" name="price"
						value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['price'];?>
" size="5" />
					</div>
					<div class="bold-text">
						Product discounted price:
					</div>
					<div>
						<input type="text" name="discounted_price"
						value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['discountedPrice'];?>
" size="5" />
					</div>
					<div>
						<br/>
						<input class="centerBtn" type="submit" name="UpdateProductInfo"
						value="Update info" />
					</div>
				</td>
				<td class="rightEdit" valign="top">
					<div>
						<font class="bold-text">Product belongs to these categories:</font>
						<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProductCategoriesString;?>

					</div>
					<div class="bold-text">
						Remove this product from:
					</div>
					<div>
						<?php echo smarty_function_html_options(array('name'=>"TargetCategoryIdRemove",'options'=>$_smarty_tpl->tpl_vars['obj']->value->mRemoveFromCategories),$_smarty_tpl);?>

						<input type="submit" name="RemoveFromCategory" value="Remove"
						<?php if ($_smarty_tpl->tpl_vars['obj']->value->mRemoveFromCategoryButtonDisabled){?>
						disabled="disabled" <?php }?>/>
					</div>
					<div class="bold-text">
						Assign product to this category:	
					</div>
					<div>
						<?php echo smarty_function_html_options(array('name'=>"TargetCategoryIdAssign",'options'=>$_smarty_tpl->tpl_vars['obj']->value->mAssignOrMoveTo),$_smarty_tpl);?>

						<input type="submit" name="Assign" value="Assign" />
					</div>
					<div class="bold-text">
						Move product to this category:
					</div>
					<div>
						<?php echo smarty_function_html_options(array('name'=>"TargetCategoryIdMove",'options'=>$_smarty_tpl->tpl_vars['obj']->value->mAssignOrMoveTo),$_smarty_tpl);?>

						<input type="submit" name="Move" value="Move" />
					</div>
					<?php if ($_smarty_tpl->tpl_vars['obj']->value->mProductAttributes){?>
						<div class="bold-text">
							<br/>
							Product attributes:
						</div>
						<div>
							<?php echo smarty_function_html_options(array('name'=>"TargetAttributeValueIdRemove",'options'=>$_smarty_tpl->tpl_vars['obj']->value->mProductAttributes),$_smarty_tpl);?>

							<input type="submit" name="RemoveAttributeValue"
							value="Remove" />
						</div>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['obj']->value->mCatalogAttributes){?>
						<div class="bold-text">
							Assign attribute to product:
						</div>
						<div>
							<?php echo smarty_function_html_options(array('name'=>"TargetAttributeValueIdAssign",'options'=>$_smarty_tpl->tpl_vars['obj']->value->mCatalogAttributes),$_smarty_tpl);?>

							<input type="submit" name="AssignAttributeValue"
							value="Assign" />
						</div>
					<?php }?>
					<div class="bold-text">
						<br/>
						Set display option for this product:
					</div>
					<div>
						<?php echo smarty_function_html_options(array('name'=>"ProductDisplay",'options'=>$_smarty_tpl->tpl_vars['obj']->value->mProductDisplayOptions,'selected'=>$_smarty_tpl->tpl_vars['obj']->value->mStock['display']),$_smarty_tpl);?>

						<input type="submit" name="SetProductDisplayOption" value="Set" />
					</div>
					<div>
						<br/>
						<input style="color:red; font-weight:bold" type="submit" name="RemoveFromCatalog"
						value="Remove product from catalog"
						<?php if (!$_smarty_tpl->tpl_vars['obj']->value->mRemoveFromCategoryButtonDisabled){?>
						disabled="disabled" <?php }?>/>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="imageEdit">
		<div>
			<font class="bold-text">Thumbnail name:</font> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['thumbImage'];?>

			<input name="ImageUpload" type="file" value="Upload" />
			<input type="submit" name="Upload" value="Upload" />
		</div>
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mStock['thumbImage']){?>
			<div>
				<img src="product_images/<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['thumbImage'];?>
"
				border="0" alt="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['itemName'];?>
 thumbnail" />
			</div>
		<?php }?>
		<div>
			<br/>
			<font class="bold-text">Large image name:</font> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['bigImage'];?>

			<input name="Image2Upload" type="file" value="Upload" />
			<input type="submit" name="Upload" value="Upload" />
		</div>
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mStock['bigImage']){?>
			<div>
				<img src="product_images/<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['bigImage'];?>
"
				border="0" alt="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock['itemName'];?>
 large image" />
			</div>
		<?php }?>
	</div>
</form><?php }} ?>