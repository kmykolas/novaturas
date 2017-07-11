<?php
/* Smarty version 3.1.30, created on 2017-07-05 14:39:16
  from "/home/magento/domains/magento.us.lt/public_html/novaturas/view/airports/list.tpl.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_595ccfe40c29e6_48850212',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e58a66d38cda41c705e8c18cd0954608ffe1320' => 
    array (
      0 => '/home/magento/domains/magento.us.lt/public_html/novaturas/view/airports/list.tpl.html',
      1 => 1499152318,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_595ccfe40c29e6_48850212 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['message']->value) {?>
    <div class="row">
        <div class="alert alert-success">
          <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

        </div>        
    </div>
<?php }?>
<form method="get" action="" id="list-form">

<div class="row">
    <div class="form-group">
    <label for="filter">Rūšiavimas:</label>
    <select class="selectpicker" name="sort" onchange="$('#list-form').submit();">
      <optgroup label="Pavadinimas" >
        <option <?php if (!empty($_GET['sort'])) {
if ($_GET['sort'] == 0) {?>selected=""<?php }
}?> value="0">A-Z</option>
        <option <?php if (!empty($_GET['sort'])) {
if ($_GET['sort'] == 1) {?>selected=""<?php }
}?> value="1">Z-A</option>
      </optgroup>
    </select>
    
    <label for="search">Paieška</label>
    <input type="text" name="search" id="search" value="<?php if (!empty($_GET['search'])) {
echo $_GET['search'];
} else {
}?>" />
        
    <button type="button" onclick="$('#page').val('1');$('#list-form').submit();" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
    <a href="./?act=airports-new" class="btn btn-success">Sukurti</a>
</div>
     <ul class="pagination">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pages']->value, 'page', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['page']->value) {
?>
            <li class="<?php echo $_smarty_tpl->tpl_vars['page']->value['class'];?>
"><a onclick="$('#page').val('<?php echo $_smarty_tpl->tpl_vars['page']->value['nr'];?>
');$('#list-form').submit();"><?php echo $_smarty_tpl->tpl_vars['page']->value['nr'];?>
</a></li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </ul>
<table id="book-list" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Pavadinimas</th>
                <th>Šalis</th>
                <th>Kordinatės</th>
                <th>Redaguoti </th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Pavadinimas</th>
                <th>Šalis</th>
                <th>Kordinatės</th>
                <th>Redaguoti </th>
            </tr>
        </tfoot>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['airports']->value, 'airport', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['airport']->value) {
?>
            <tr onclick="window.location='./?act=airport-item&id=<?php echo $_smarty_tpl->tpl_vars['airport']->value['id'];?>
';">
                <td><?php echo $_smarty_tpl->tpl_vars['airport']->value['title'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['airport']->value['countriie_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['airport']->value['longitude'];?>
;<?php echo $_smarty_tpl->tpl_vars['airport']->value['latitude'];?>
</td>
                <td>Redaguoti</td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </tbody>
    </table>
    <input type="hidden" name="act" value="airlines-list" />
    <input type="hidden" name="page" value="<?php if (!empty($_GET['page'])) {
echo $_GET['page'];
} else { ?>1<?php }?>" id="page" />
    
     <ul class="pagination">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pages']->value, 'page', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['page']->value) {
?>
            <li class="<?php echo $_smarty_tpl->tpl_vars['page']->value['class'];?>
"><a onclick="$('#page').val('<?php echo $_smarty_tpl->tpl_vars['page']->value['nr'];?>
');$('#list-form').submit();"><?php echo $_smarty_tpl->tpl_vars['page']->value['nr'];?>
</a></li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </ul>
</form><?php }
}
