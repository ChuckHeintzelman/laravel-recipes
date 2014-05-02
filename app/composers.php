<?php

/*
|--------------------------------------------------------------------------
| View Composers
|--------------------------------------------------------------------------
|
| We use view composers to keep the controllers as skinny as possible.
|
*/

View::composer('layouts.default', 'Recipes\Composers\LayoutsDefaultComposer');
View::composer('home', 'Recipes\Composers\HomeComposer');
View::composer('contents', 'Recipes\Composers\ContentsComposer');
View::composer('topics', 'Recipes\Composers\TopicsComposer');
View::composer('codes', 'Recipes\Composers\CodesComposer');