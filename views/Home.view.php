<style>
a{
    text-decoration:none;
    color: red;
}
.active
{
    color:green;
}
</style>
<h1>HOME</h1>
<pre>
<?php
    var_dump($_SESSION);
    
?>
</pre>
<a href="<?=Router::Link('/Test')?>" class="<?=Router::IsActive('/Test','active')?>">Test</a>