<section id="user-panel">
    <div  class="user">
        <span onclick='window.location = "account"' class="tooltip" title="Account bekijken"></span>
    </div>
    <div class="edit">
        <span onclick='window.location = "<?php echo '?' . $_SERVER['QUERY_STRING'] . '&edit'?>"' class="tooltip" title="Pagina bewerken"></span>
    </div>
    <div class="calender">
        <span onclick='window.location = "evenement"' class="tooltip" title="Evenement toevoegen"></span>
    </div>
    <div class="log-out">
        <span onclick='window.location = "<?php echo '?' . $_SERVER['QUERY_STRING'] . '&logout'?>"' class="tooltip" title="Uitloggen"></span>
    </div>
</section>