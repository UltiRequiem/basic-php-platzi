<?php

$db = new SQLite3('people.db');

const query = "
CREATE TABLE IF NOT EXISTS people (
   	name TEXT NOT NULL
);
";

$db->query(query);

for ($i = 1; $i < 5; $i++) {
        $insert = $db->prepare('INSERT INTO people VALUES(:name)');

        $insert->bindValue(':name', chr($i + 64));

        $insert->execute();
}

$results = $db->query('SELECT * FROM people');

while ($row = $results->fetchArray()) {
        echo json_encode($row) . "\n";
        /* var_dump($row); */
}
