<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>HomeWork 1</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
    <div class="col-8">
    <h2>Форма регистрации</h2>
        <form action="" method="post">
        <label for="name">Имя:</label>
        <input type="text" class="form-control" name="name" placeholder="Введите имя">
        <label for="email">Почта:</label>
        <input type="text" class="form-control" name="email" placeholder="Введите почту">
        <label for="phone">Телефон:</label>
        <input type="text" class="form-control" name="phone" placeholder="Введите телефон">
        <label for="cars">Выберите любимые авто:</label><br>
        <select name="cars[]" class="form-control" multiple>
        <option value="BMW">BMW</option>
        <option value="Mercedes">Mercedes</option>
        <option value="Audi">Audi</option>
        <option value="Volvo">Volvo</option>
    </select><br>
    <label for="movies">Выберите любимые фильмы. Минимум 2 или более через запитую</label><br>
    <input type="text" class="form-control" name="movies" placeholder="Введите филмы через запитую"><br>
        <button type="submit" class="btn btn-dark">Отправить</button>
        </form>
    

        <hr>

    <?php

        $error = false;


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $cars = $_POST["cars"];
            $movies = $_POST["movies"];
            $moviesArray = explode(',', $movies); // convert movies to array by comma
            //$car_counts = sizeof($cars);
            $pos = strpos($movies, ',');
            $error = false;

            if (strlen($name)<3) {
                echo "<div class=\"alert alert-danger\" role=\"alert\">";
                echo '* Введите имя'; 
                echo "</div>";
                
                $error = true;
            }
            if (strlen($email)<5) {
                echo "<div class=\"alert alert-danger\" role=\"alert\">";
                echo '* Введите почту' . '<br>';
                echo "</div>";
                $error = true;
            }

            if (strlen($phone)<10) {
                echo "<div class=\"alert alert-danger\" role=\"alert\">";
                echo '* Введите телефон' . '<br>';
                echo "</div>";
                $error = true;
            }
            if ($cars[0]=="") {
                echo "<div class=\"alert alert-danger\" role=\"alert\">";
                echo '* Выберите хот одну машину' . '<br>';
                echo "</div>";
                $error = true;
            }
            if (!$pos){
                echo "<div class=\"alert alert-danger\" role=\"alert\">";
                echo '* Введите 2 или более любимых фильма' . '<br>';
                echo "</div>";
                $error = true;
            }

        // if no error: 

            if (!$error){
                echo "<div class=\"alert alert-info\" role=\"alert\">";
                echo "<h2>Вся информация:</h2>";
                echo $name;
                echo "<br>";
                echo $email;
                echo "<br>";
                echo $phone;
                echo "<br>";
                echo "<h3>fav_cars:</h3>";
                echo "<ul>";
                foreach ($cars as $a){
                    echo '<li>'. $a . "</li>";
                }
                echo "</ul>";
                
                //echo $movies;
            
                echo "<h3>fav_films:</h3>";
                echo "<ul>";
                foreach ($moviesArray as $a){
                    echo '<li>'. $a . "</li>";
                }
                echo "</ul>";
                    echo "<br>";

                    echo "</div>";


            }
        
        }



    ?>
    </div>
    </div>
</div>
</body>
</html>