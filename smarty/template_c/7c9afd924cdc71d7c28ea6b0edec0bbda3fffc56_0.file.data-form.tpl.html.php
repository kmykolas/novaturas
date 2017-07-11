<?php
/* Smarty version 3.1.30, created on 2017-06-29 21:57:23
  from "/home/magento/domains/magento.us.lt/public_html/novaturas/view/data-form.tpl.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59554d93346355_53234044',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c9afd924cdc71d7c28ea6b0edec0bbda3fffc56' => 
    array (
      0 => '/home/magento/domains/magento.us.lt/public_html/novaturas/view/data-form.tpl.html',
      1 => 1498663335,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59554d93346355_53234044 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Šalių atnaujinimas</h1>
    <div class="row">
        <div class="alert alert-info">
          Šalys atnaujinamos iš http://www.nationsonline.org/oneworld/country_code_list.htm
        </div>        
    </div>
<?php if ($_smarty_tpl->tpl_vars['inserted']->value > 0) {?>
    <div class="row">
        <div class="alert alert-success">
          <strong>Importuotos</strong> <?php echo $_smarty_tpl->tpl_vars['inserted']->value;?>
 šalys.
        </div>        
    </div>
<?php }?>



<?php }
}
