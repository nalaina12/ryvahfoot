<?php
// Include config file
require_once("../config/database.php");

// Define variables and initialize with empty values
$nom = $adresse = $airtel = "";
$nom_err = $adresse_err = $airtel_err = "";
$chaine = array("options" => array("regexp" => "/^[a-zA-Z\s]+$/"));


// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $input_nom = trim($_POST["nom"]);
    if (empty($input_nom)) {
        $nom_err = "<script>alert(\"Entrez votre le nom du club\")</script>";
    } elseif (!filter_var($input_nom, FILTER_VALIDATE_REGEXP, $chaine)) {
        $nom_err = "<script>alert(\"Nom inexistant\")</script>";
    } else {
        $nom = $input_nom;
    }

    // Validate address
    $input_adresse = trim($_POST["adresse"]);
    if (empty($input_adresse)) {
        $adresse_err = "Ampidiro ny adiresinao.";
    } else {
        $adresse = $input_adresse;
    }

    // Validate salary
    $input_airtel = trim($_POST["airtel"]);
    if (empty($input_airtel)) {
        $airtel_err = "<script>alert(\"Ampidiro ilay numero azafady\")</script>";
    } elseif (!preg_match("#^033[0-9]{7}$|^034[0-9]{7}$|^032[0-9]{7}$#", $input_airtel)) {
        $airtel_err = "<script>alert(\"$input_airtel:  n'existe pas\")</script>";
    } else {
        $airtel = $input_airtel;
    }


    // Check input errors before inserting in database

    if (empty($nom_err) && empty($adresse_err) && empty($airtel_err) && empty($orange_err) && empty($telma_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO club (nomClub, adresse, airtel) VALUES (?, ?, ?)";

        if ($stmt = $base->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sss", $param_nom, $param_address, $param_airtel);

            // Set parameters
            $param_nom = $nom;
            $param_address = $adresse;
            $param_airtel = $airtel;



            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to landing page
                echo "<script>alert(\"Enregistrer avec succès\")</script>";
                exit();
            } else {
                echo "Quelque chose a mal tourné. Veuillez réessayer plus tard.";
            }
        }

        // Close statement
        //  $stmt->close();
    }


    // Close connection
    $base->close();
}
?>


<div class=" justify-content-end">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2 style="padding-left: 30%">Formulaire d'un club</h2>
                </div>
                <p></p>
                <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($nom_err)) ? 'has-error' : ''; ?> ">
                        <label>Nom du club:</label>
                        <input type="text" name="nom" class="form-control col-sm-10" value="<?php echo $nom; ?>">
                        <span class="help-block"><?php echo $nom_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($adresse_err)) ? 'has-error' : ''; ?>">
                        <label>Adresse:</label>
                        <input type="text" name="adresse" class="form-control col-sm-10" value="<?php echo $adresse; ?>">
                        <!-- <textarea name="adresse" class="form-control col-sm-10"><?php echo $adresse; ?></textarea> -->
                        <span class="help-block"><?php echo $adresse_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($airtel_err)) ? 'has-error' : ''; ?>">
                        <label>Telephone :</label>
                        <input type="text" name="airtel" class="form-control col-sm-10" value="<?php echo $airtel; ?>">
                        <span class="help-block"><?php echo $airtel_err; ?></span>
                    </div>

                    <div style="padding-left: 40%">
                        <input type="submit" class="btn btn-primary" value="Valider">
                        <a href="" class="btn btn-danger">Initialiser</a>
                    </div>
                </form>
                <br />
                <br />
                <br />

            </div>
        </div>
    </div>
</div>

</div>

</body>

</html>