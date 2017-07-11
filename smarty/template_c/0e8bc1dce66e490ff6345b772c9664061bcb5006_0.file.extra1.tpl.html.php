<?php
/* Smarty version 3.1.30, created on 2017-07-11 13:10:05
  from "/home/magento/domains/magento.us.lt/public_html/novaturas/view/extra/extra1.tpl.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5964a3fdc73805_67983273',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e8bc1dce66e490ff6345b772c9664061bcb5006' => 
    array (
      0 => '/home/magento/domains/magento.us.lt/public_html/novaturas/view/extra/extra1.tpl.html',
      1 => 1499767794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5964a3fdc73805_67983273 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section>
    <h1>Šalių sąrašas kurioms nėra priskirtos avialinijos</h1>
    <ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'itm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itm']->value) {
?>
    <li><?php echo $_smarty_tpl->tpl_vars['itm']->value['title'];?>
</li>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </ul>
</section><?php }
}
