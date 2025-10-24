<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контактная форма</title>
</head>
<body>
    <form id="contactForm">
        <input type="text" name="name" placeholder="Ваше имя" required><br>
        <input type="text" name="phone" placeholder="Телефон (+7 999 999 99 99)" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <button type="submit">Отправить</button>
    </form>

    <div id="message" style="display:none;">Форма успешно отправлена!</div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            axios.post('/contact', formData)
                .then(function (response) {
                    document.getElementById('message').style.display = 'block';
                    setTimeout(function() {
                        document.getElementById('message').style.display = 'none';
                    }, 3000);
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    </script>
</body>
</html>
