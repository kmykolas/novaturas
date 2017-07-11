<?php
/* Smarty version 3.1.30, created on 2017-07-11 13:29:26
  from "/home/magento/domains/magento.us.lt/public_html/novaturas/view/extra/extra2.tpl.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5964a886dab828_67166911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89b4063af7479e97ed5463c277a97a4c23891593' => 
    array (
      0 => '/home/magento/domains/magento.us.lt/public_html/novaturas/view/extra/extra2.tpl.html',
      1 => 1499768964,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5964a886dab828_67166911 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section>
    <h1>Oro uostai į kuriuos skrenda tik pasirinktos šalies avialinijos</h1>
    <form action="" method="post">
          <div class="form-group">
            <label for="pwd">Pasirinkite šalį:</label>
            <select name="countryid" class="form-control">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'itm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itm']->value) {
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['itm']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['itm']->value['title'];?>
</option>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </select>
          </div>    
          <button type="submit" class="btn btn-default">Filtruoti</button>
    </form>
    <br /><br />
    <ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['airports']->value, 'itm');
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
    <?php if (empty($_smarty_tpl->tpl_vars['airports']->value)) {?>
<div class="alert alert-danger">
  Rezultatų nerasta
</div>
    <?php }?>
</section><?php }
}
