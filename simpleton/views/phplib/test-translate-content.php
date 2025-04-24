<?php
use \ehsanx64\phplib\Translate;

$trn = new Translate(dirname(__FILE__) . '/lang');
$trn->setLocale('fa');
?>

<h3>Initialization</h3>
<p>Initialize the translate class. In this example we save the object in a variable named <em>$trn</em>.
In this example we're setting a folder named <em>lang</em> in current directory</p>
<h5>Source</h5>
<pre>
    <code class="language-php" line-numbers>
        $trn = new Translate(dirname(__FILE__) . '/lang');
    </code>
</pre>

<h3>Text Translation</h3>
<p>Translation is done by passing a string to translate to method <em>t</em>.</p>
<p><strong>Note:</strong>&nbsp;The translation module first check for active locale code and load translation files accordingly.
</p>
<h5>Source</h5>
<pre>
    <code class="language-php" line-numbers>
        $str = 'Hello';
        printf("Original: %s\n", $str);
        printf("Translated: %s\n", $trn->t($str));
    </code>
</pre>

<h5>Demo</h5>
<pre><code><?php
        $str = 'Hello';
        printf("Original: %s\n", $str);
        printf("Translated: %s\n", $trn->t($str));
?></code></pre>

<h3>Modify active language (locale) for translation</h3>
<p>Default locale for translation can be selected by this method.</p>
<h5>Source</h5>
<pre>
    <code class="language-php" line-numbers>
        // Set default locale to fa (persian)
        $t->setLocale('fa');
    </code>
</pre>

<h3>Translating a compilicated string</h3>
<p>Complicated string (in this context) means those strings that has special characters inside; for example: a string passed to <em>printf/sprintf</em> functions which typically looks like: <code>You have %s messages with %s unread</code></p>

<p>In such situations which we should pass additional data to be used after string translations we can do something like this:</p>
<h5>Source</h5>
<pre>
    <code class="language-php" line-numbers>
        $str = 'You have %s messages with %s unread';
        printf("The template: %s\n", $str);
        $xlated = $trn->t($str);
        printf("Translated string: %s\n", $xlated);
        printf("Translated and processed string: %s\n", sprintf($xlated, 1, 2));
    </code>
</pre>

<h5>Demo</h5>
<pre>
<code><?php
        $str = 'You have %s messages with %s unread';
        printf("The template: %s\n", $str);
        $xlated = $trn->t($str);
        printf("Translated string: %s\n", $xlated);
        printf("Translated and processed string: %s", sprintf($xlated, 1, 2));
        ?></code>
</pre>


<h3>Translating a compilicated string (shorter version)</h3>
<p>We can use <em>tr</em> method to pass the translated string automatically after translation to <em>sprintf</em> function which does string substitution on a string buffer.</p>
<h5>Source</h5>
<pre>
    <code class="language-php" line-numbers>
        $str = 'You have %s messages with %s unread';
        printf("The template: %s\n", $str);
        printf("Translated string: %s\n", $trn->tr($str, 1, 2));
    </code>
</pre>

<h5>Demo</h5>
<pre><code><?php
        $str = 'You have %s messages with %s unread';
        printf("The template: %s\n", $str);
        printf("Translated string: %s", $trn->tr($str, 1, 2));
?></code></pre>



