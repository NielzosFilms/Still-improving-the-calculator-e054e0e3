<h1>Calculator</h1>
<form action="calculator.php" method="POST" id="calc_form">
    <input type="text" name="num_1" placeholder="Eerste nummer" /><br>
    <input type="text" name="num_2" placeholder="Tweede nummer" /><br>
    <input type="submit" name="add" value="Add" />
    <input type="submit" name="sub" value="Subtract" />
    <input type="submit" name="mul" value="Multiply" />
    <input type="submit" name="dev" value="Devide" />
    <input type="submit" name="mod" value="Modulo" />
</form>

<?php

function calculate() {
    $ans = 0;
    if(!isset($_POST["num_1"])) throw new Exception("Nummer 1 is niet ingevult");
    if(!isset($_POST["num_2"])) throw new Exception("Nummer 2 is niet ingevult");
    if(!is_numeric($_POST["num_1"])) throw new Exception("Nummer 1 is geen nummer");
    if(!is_numeric($_POST["num_2"])) throw new Exception("Nummer 2 is geen nummer");
    foreach($_POST as $post=>$val) {
        switch($post){
            case "add":
                $ans = $_POST["num_1"] + $_POST["num_2"];
            break;
            case "sub":
                $ans = $_POST["num_1"] - $_POST["num_2"];
            break;
            case "mul":
                $ans = $_POST["num_1"] * $_POST["num_2"];
            break;
            case "dev":
                $ans = $_POST["num_1"] / $_POST["num_2"];
            break;
            case "mod":
                $ans = $_POST["num_1"] % $_POST["num_2"];
            break;
            default:
            break;
        }
    }
    return $ans;
}

try {
    if(isset($_POST["add"]) || isset($_POST["sub"]) || isset($_POST["mul"]) || isset($_POST["dev"]) || isset($_POST["mod"]) ) {
        $ans = calculate();
        echo($ans);
    }
} catch(Exception $e) {
    echo("Error: ".$e->getMessage());
}

?>