<?php

$db = new mysqli("localhost", "uwialumni", "kylehavemercy", "uwialumni");
$res = $db->query("SELECT * FROM `graduates`");
echo(print_r($res->fetch_assoc()));