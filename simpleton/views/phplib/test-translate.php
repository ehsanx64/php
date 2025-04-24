<?php
use \ehsanx64\phplib\Translate;

$t = new Translate(dirname(__FILE__) . '/lang');
ob_start();

$t1original = 'Hello';
$t1xlated = $t->t($t1original);

$t->setLocale('fa');
p('Translating a complicated string...');

$t2original = 'You have %s messages with %s unread';
$t2originalParams = [2, 1];
$t2xlated = $t->trn($t2original, extract($t2originalParams));
?>

<h3>Text Translation</h3>
<h5>Source</h5>
<code>
    $t1original = 'Hello';
    $t1xlated = $t->t($t1original);
</code>

<h5>Demo</h5>
<p>Original: <?= $t1original ?></p>
<p>Translated: <?= $t1xlated ?></p>

<h3>Modify active language (locale) for translation</h3>
<h5>Source</h5>
<code>
    $t->setLocale('fa');
</code>

<h3>Translating a compilicated string...</h3>
<h5>Source</h5>
<code>
    $t2original = 'You have %s messages with %s unread';
    $t2originalParams = [2, 1];
    $t2xlated = $t->trn($t2original, extract($t2originalParams));
</code>

<h5>Demo</h5>
<p>Original: <?= $t2original ?></p>
<p>Parameters: <? print_r($t2originalParams); ?></p>
<p>Translated: <?= $t2xlated; ?></p>

