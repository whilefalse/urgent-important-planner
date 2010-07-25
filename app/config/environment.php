<?php
$env = @get_env('CAKE_ENV');
if (!$env){$env = 'production';}
$env = strtolower($env);