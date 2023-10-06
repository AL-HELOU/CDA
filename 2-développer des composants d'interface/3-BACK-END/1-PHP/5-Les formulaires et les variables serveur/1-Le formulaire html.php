
<!-- http://localhost:8080/1-Le%20formulaire%20html.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>JS Les formulaires EXC</title>
</head>
<body>

    <h1 class="Vcoo"> Vos coordonnées : </h1>
    <h2 class="oblig">* Ces zones sont obligatoires pour envoyer le formulaire.</h2>

    <form action="2-Les formulaires EXCERCICE.php" method="post" class="form" id="form">

        <label for="soc" class="labl" id="lablsoc">Société :&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
        <input type="text" name="soc" id="soc" class="inpt"> <span class="oblig">*</span>         
        <br>

        <label for="pac" class="labl" id="lablpac">Personne à contacter :&emsp;&emsp;&emsp;&emsp;&emsp;</label>
        <input type="text" name="pac" id="pac" class="inpt"><span class="oblig">*</span> 
        <br>

        <label for="entrep" class="labl" id="lablentrep">Addresse de l'entreprise :&emsp;&emsp;&emsp;&ensp;</label>
        <textarea name="entrep" cols="28" rows="5" id="txtarea"></textarea>
        <br><br>

        <label for="cp" class="labl" id="lablcp">Code Postal :&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;</label>
        <input type="text" name="cp" id="cp" class="inpt"><span class="oblig">*</span> 
        <br>

        <label for="ville" class="labl" id="lablville">Ville :&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
        <input type="text" name="ville" id="ville" class="inpt"><span class="oblig">*</span> 
        <br>

        <label for="email" class="labl" id="lablmail">E-mail :&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
        <input type="text" name="email" id="email" class="inpt"><span class="oblig">*</span> 
        <br>

        <label for="tel" class="labl" id="labltel">Téléphone :&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;</label>
        <input type="text" name="tel" id="tel" class="inpt">
        <br>

        <div class="lablselect">
            <label for="etdp" class="labl" id="labletdp">
<pre>Sélectionnez
l'environnement
technique du projet :</pre>
            </label>

            <select name="etdp" id="etdp">
                <option value="" selected>Choisissez</option>
                <option value="Access">Access</option>
                <option value="Java">Java</option>
                <option value="Delphi">Delphi</option>
                <option value="windev">Windev</option>
                <option value="Visual Basic">Visual Basic</option>
                <option value="Power Builder">Power Builder</option>
                <option value="Internet">Internet</option>
                <option value="Intranet">Intranet</option>
                <option value="Windows NT">Windows NT</option>
                <option value="Unix">Unix</option>
                <option value="SQL Server">SQL Server</option>
                <option value="Oracle">Oracle</option>
                <option value="Autres...">Autres...</option>
            </select>
        </div>
        <textarea name="txtarea" cols="28" rows="9" id="txtarea2"></textarea>

        <br><br>
        <div class="divbtn">
            <button type="submit" class="btn" id="submit">Envoyer</button>
            <button type="reset" class="btn">Effacer</button>
        </div>
    </form>

    <script src="form.js"></script>
</body>
</html>