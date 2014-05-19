<h1>Busqueda con Web Crawler</h1>
    <form name="form_search" method="post" action="<?php echo \core\URL::generar("crawler/result_search"); ?>">
        <input id='search' name='search' type="text" value='' />
        <input id='url' name='url' type="text" value='' />
        <input type='submit' value='send'/>
    </form>
