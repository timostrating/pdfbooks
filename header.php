<!doctype html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title><?= isset($PageTitle) ? $PageTitle : "Standaard titel"?></title>
    <h1>Dit is de header</h1>
    <?php if (function_exists('customPageHeader')){
      customPageHeader();
    }?>
  </head>
  <body>
