<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = $_POST['nume'] ?? '';
    $email = $_POST['email'] ?? '';
    $mesaj = $_POST['mesaj'] ?? '';
    $erori = [];
    if (strlen($nume) < 3) $erori['nume'] = "Minim 3 caractere.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $erori['email'] = "Email invalid.";
    if (strlen($mesaj) < 10) $erori['mesaj'] = "Minim 10 caractere.";
    if (empty($erori)) {
        echo json_encode(['ok' => true, 'text' => "Mulțumim $nume! Mesaj: $mesaj"]);
    } else {
        echo json_encode(['ok' => false, 'erori' => $erori]);
    }
    exit;
}
?>

<!DOCTYPE html>
<head>
    <title>Contact Simplu</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        input, textarea { display: block; margin-bottom: 5px; width: 300px; }
        .eroare { color: red; font-size: 12px; margin-bottom: 15px; display: block; }
        #mesajSucces { color: green; font-weight: bold; font-size: 18px; }
    </style>
</head>
<body>

    <div id="containerFormular">
        <form id="myForm">
            <label>Nume:</label>
            <input type="text" name="nume">
            <span id="err_nume" class="eroare"></span>

            <label>Email:</label>
            <input type="text" name="email">
            <span id="err_email" class="eroare"></span>

            <label>Mesaj:</label>
            <textarea name="mesaj"></textarea>
            <span id="err_mesaj" class="eroare"></span>

            <button type="submit">Trimite</button>
        </form>
    </div>

    <div id="mesajSucces"></div>

    <script>
        document.getElementById('myForm').addEventListener('submit', function(e) {
            e.preventDefault();
            document.querySelectorAll('.eroare').forEach(el => el.innerText = '');
            document.getElementById('mesajSucces').innerText = '';
            fetch('', { 
                method: 'POST', 
                body: new FormData(this) 
            })
            .then(res => res.json())
            .then(data => {
                if (data.ok) {
                    document.getElementById('containerFormular').style.display = 'none';
                    document.getElementById('mesajSucces').innerText = data.text;
                } else {
                    if(data.erori.nume) document.getElementById('err_nume').innerText = data.erori.nume;
                    if(data.erori.email) document.getElementById('err_email').innerText = data.erori.email;
                    if(data.erori.mesaj) document.getElementById('err_mesaj').innerText = data.erori.mesaj;
                }
            });
        });
    </script>
</body>
</html>