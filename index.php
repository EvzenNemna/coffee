<!DOCTYPE HTML>
<head>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Jméno</th>
                <th scope="col">Typ</th>
                <th scope="col">Vypito</th>
                <th scope="col">Kc</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                require_once('db.php');
                $sql = "";

                if (isset($_POST['people'])) {
                    $name = $_POST['people'];                    
                    if ($name == "Všichni") {
                        $sql = "SELECT people.name, types.typ, count(drinks.ID) as vypito from drinks inner join people ON drinks.id_people = people.ID inner join types ON drinks.id_types = types.ID group by types.typ, people.name order by people.name;";
                    } else {
                        $sql = "SELECT people.name, types.typ, count(drinks.ID) as vypito from drinks inner join people ON drinks.id_people = people.ID inner join types ON drinks.id_types = types.ID where people.name = '$name' group by types.typ, people.name order by people.name;";
                    }

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $kc = 0;

                            $name = $row["name"];
                            $typ = $row["typ"];
                            $vypito = $row["vypito"];

                            switch($typ){
                                case "Mléko":
                                    $kc = $vypito * 1.2;
                                    break;
                                case "Espresso":
                                    $kc = $vypito * 2.1;
                                    break;
                                case "Coffe":
                                    $kc = $vypito * 4.2;
                                    break;
                                case "Long":
                                    $kc = $vypito * 4.2;
                                    break;
                                case "Doppio+":
                                    $kc = $vypito * 6.3;
                                    break;
                            }
    
                            echo "<tr><th>$name</th><th>$typ</th><th>$vypito</th><th>$kc</th></tr>";
                        }
                    }
                } 
            ?>
        </tbody>
    </table>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Jméno</th>
                <th scope="col">Typ</th>
                <th scope="col">Vypito</th>
                <th scope="col">Měsíc</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                require_once('db.php');
                $sql = "";

                if (isset($_POST['people'])) {
                    $name = $_POST['people'];                    
                    if ($name == "Všichni") {
                        $sql = "SELECT people.name, types.typ, count(drinks.ID) as vypito from drinks inner join people ON drinks.id_people = people.ID inner join types ON drinks.id_types = types.ID group by types.typ, people.name order by people.name;";
                    } else {
                        $sql = "SELECT people.name, types.typ, count(drinks.ID) as vypito from drinks inner join people ON drinks.id_people = people.ID inner join types ON drinks.id_types = types.ID where people.name = '$name' group by types.typ, people.name order by people.name;";
                    }

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $kc = 0;

                            $name = $row["name"];
                            $typ = $row["typ"];
                            $vypito = $row["vypito"];

                            switch($typ){
                                case "Mléko":
                                    $kc = $vypito * 1.2;
                                    break;
                                case "Espresso":
                                    $kc = $vypito * 2.1;
                                    break;
                                case "Coffe":
                                    $kc = $vypito * 4.2;
                                    break;
                                case "Long":
                                    $kc = $vypito * 4.2;
                                    break;
                                case "Doppio+":
                                    $kc = $vypito * 6.3;
                                    break;
                            }
    
                            echo "<tr><th>$name</th><th>$typ</th><th>$vypito</th><th>$kc</th></tr>";
                        }
                    }
                } 
            ?>
        </tbody>
    </table>
    <form method="post" action="">
        <select name="people">
            <?php
                require_once('db.php');
                
                $sql = "SELECT name from people;";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $name = $row["name"];
                        $typ = $row["typ"];
                        $vypito = $row["vypito"];

                        echo "<tr><th>$name</th><th>$typ</th><th>$vypito</th></tr>";
                    }
                }
            ?>
            <option value="Všichni" name="jmeno">Všichni</option>
            <option value="Masopust Lukáš" name="jmeno">Masopust Lukáš</option>
            <option value="Molič Jan" name="jmeno">Molič Jan</option>
            <option value="t" name="jmeno">t</option>
        </select>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>

