<?php
/* Smarty version 3.1.30, created on 2017-07-11 13:06:35
  from "/home/magento/domains/magento.us.lt/public_html/novaturas/view/main.tpl.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5964a32b4cee98_33183242',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c29971897acabe951833a689b9438f967307e86' => 
    array (
      0 => '/home/magento/domains/magento.us.lt/public_html/novaturas/view/main.tpl.html',
      1 => 1499767201,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5964a32b4cee98_33183242 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
">
	<head>
		<title>Uzduotis</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="ROBOTS" content="Index, FOLLOW" />
		<meta name="author" content="Mykolas Kazlauskas" />
		<meta name="Description" content="" />
		<meta name="Keywords" content="" /> 
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <?php echo '<script'; ?>
 src="js/jquery-3.1.1.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="js/bootstrap.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtDQL32YOP5q_6zyMGnK-4xWla51xqqEI"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="js/main.js"><?php echo '</script'; ?>
>
	</head>
	<body>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="">Užduotis-novaturas</a>
            </div>
            <ul class="nav navbar-nav">
              <li class=""><a href="./?act=airports-list">Oro uostai</a></li>
              <li class=""><a href="./?act=airlines-list">Avialinijos</a></li>
              <li class=""><a href="./?act=data-form">Atnaujinti šalis</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Papildoma
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="./?act=extra1">Šalys be avialinijų</a>
                  <a class="dropdown-item" href="./?act=extra2">Oro uostų avialinijos pagal šąlį</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>        
		<div class="container"><?php echo $_smarty_tpl->tpl_vars['main_output']->value;?>
</div>
	</body>
</html><?php }
}
