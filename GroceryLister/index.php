<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <div class="section-form">
        <section>
            <img class="images" src="Images\11.png" alt="">
            <h6><i>Grocery Inc.</i></h6>
            <div class="count-section">
                <h1>Buy Groceries</h1>
                <h1 class="count"></h1>
                <input type="text" id="inp">
            </div>
        </section>
        <button id="button-add"><span class="material-symbols-outlined">add_circle</span></button>
        <button id="button-remove"><span class="material-symbols-outlined">variable_remove</span></button>
        <ul class="elements">
            <li>Pine </li>
            <li>Fresh</li>
            <li>Honey</li>
        </ul>
    </div>
    <div class="table">
        <h1 class="table-title">Available Groceries</h1>
        <table>
            <thead>
                <tr>
                    <th>Name of Grocery Item</th>
                    <th>Country of Origin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = file_get_contents('data.json');
                $array = json_decode($data, true);
                if ($array === null){
                    echo "Error decoding data";
                    exit;
                }
                $filtered_data = [];
                foreach($array as $item){
                    $filtered_data[] = [
                        'Name' =>$item['name'],
                        'Country' => $item['country']
                    ];
                }

                foreach ($filtered_data as $object){
                    echo '<tr>';
                    foreach ($object as $cell){
                        echo '<td>' . $cell . '</td>';
                    }
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="script.js"></script>
</body>
</html>
