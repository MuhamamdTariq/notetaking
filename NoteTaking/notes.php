<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="notes.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
<div class="container">
    <div class="note-box">
        <h1> Enter your Notes : </h1>
        <div class="note-counter"><input type="text" name="note" id="note-id"><p id="note-counter">1</p></div>
        <button id="add-note"><span class="material-symbols-outlined">description</span></button>
        <button id="edit-note"><span class="material-symbols-outlined">edit_note</span></button>
        <ul id="notes-list">
            <li>Practice note</li>
            <form method="POST" action="database.php">
            <?php 

            
            require "database.php";

            ?>
            
            </form>
        </ul>
        <textarea name="added" id="number-of">Number</textarea> <br>
        <button>All Notes</button>




    </div>
    <div class="newnote">
        <button id="view-list"><span class="material-symbols-outlined">view_list</span></button>
        <h1>List of all your notes:</h1>
        <ul class="allnotes"> 
            <?php 

            update();
            ?>
        </ul>
    </div>
</div>


    <script src="notes.js"></script>
    
</body>
</html>