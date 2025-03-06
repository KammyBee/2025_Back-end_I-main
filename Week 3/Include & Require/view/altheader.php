<header>
    <?php
    $name = filter_input(INPUT_GET, "firstName", FILTER_UNSAFE_RAW);
    if (!empty($name)) {
        include('./view/greeting/user_greeting.php');
    } else {
        include('./view/greeting/visitor_greeting.php');
    }
    ?>
</header>