<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <form action="password.php">
            <div class="row align-items-center mb-3">
                <div class="col-6">
                    <span>Lunghezza password:</span>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <input class="form-control" type="number" name="pwdLength" id="pwdLength" required>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <span>Consenti ripetizioni di uno o più caratteri:</span>
                </div>

                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="moreChar" id="enable" value="yes" checked>
                        <label class="form-check-label" for="enable">
                            Sì
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="moreChar" id="disable" value="no">
                        <label class="form-check-label" for="disable">
                            No
                        </label>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mb-3">
                <div class="col-6"></div>

                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" value="include" type="checkbox" id="letters" name="letters">
                        <label class="form-check-label" for="letters">
                            Lettere
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="include" type="checkbox" id="numbers" name="numbers">
                        <label class="form-check-label" for="numbers">
                            Numeri
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="include" type="checkbox" id="symbols" name="symbols">
                        <label class="form-check-label" for="symbols">
                            Simboli
                        </label>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mb-3">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" id="submit-button">Genera</button>
                    <button type="reset" class="btn btn-secondary" id="reset-button">Annulla</button>
                    <span id="warning-text" class="text-danger ms-3 d-none">Password troppo lunga per evitare ripetizioni</span>
                </div>
            </div>
        </form>
</body>

</html>

<script>
    const resetButton = document.getElementById('reset-button');
    resetButton.addEventListener('click', (event) => {
        resetInputStyle();
    })

    const submitButton = document.getElementById('submit-button');
    submitButton.addEventListener('click', (event) => {
        const pwdLenght = document.getElementById('pwdLength').value;
        const moreChar = document.querySelector('input[name="moreChar"]:checked').value == 'yes' ? true : false;
        const letters = document.getElementById('letters').checked;
        const numbers = document.getElementById('numbers').checked;
        const symbols = document.getElementById('symbols').checked;
        const warningText = document.getElementById('warning-text');
        const htmlElementPwdLength = document.getElementById('pwdLength');
        const htmlElementLetters = document.getElementById('letters');
        const htmlElementNumbers = document.getElementById('numbers');
        const htmlElementSymbols = document.getElementById('symbols');

        resetInputStyle();

        if (!letters && !numbers && !symbols) {
            event.preventDefault();
            warningText.classList.remove('d-none');
            warningText.innerHTML = 'Selezionare almeno una caratteristica';
            htmlElementLetters.classList.add('border-danger');
            htmlElementNumbers.classList.add('border-danger');
            htmlElementSymbols.classList.add('border-danger');
        }

        if (!moreChar) {
            if (letters && !numbers && !symbols && pwdLenght > 25) {
                event.preventDefault();
                warningText.classList.remove('d-none');
                warningText.innerHTML = 'Password troppo lunga per evitare ripetizioni';
                htmlElementPwdLength.classList.add('border-danger')
            } else if (!letters && numbers && !symbols && pwdLenght > 10) {
                event.preventDefault();
                warningText.classList.remove('d-none');
                warningText.innerHTML = 'Password troppo lunga per evitare ripetizioni';
                htmlElementPwdLength.classList.add('border-danger')
            } else if (!letters && !numbers && symbols && pwdLenght > 13) {
                event.preventDefault();
                warningText.classList.remove('d-none');
                warningText.innerHTML = 'Password troppo lunga per evitare ripetizioni';
                htmlElementPwdLength.classList.add('border-danger')
            } else if (letters && numbers && !symbols && pwdLenght > 21) {
                event.preventDefault();
                warningText.classList.remove('d-none');
                warningText.innerHTML = 'Password troppo lunga per evitare ripetizioni';
                htmlElementPwdLength.classList.add('border-danger')
            } else if (letters && !numbers && symbols && pwdLenght > 25) {
                event.preventDefault();
                warningText.classList.remove('d-none');
                warningText.innerHTML = 'Password troppo lunga per evitare ripetizioni';
                htmlElementPwdLength.classList.add('border-danger')
            } else if (!letters && numbers && symbols && pwdLenght > 20) {
                event.preventDefault();
                warningText.classList.remove('d-none');
                warningText.innerHTML = 'Password troppo lunga per evitare ripetizioni';
                htmlElementPwdLength.classList.add('border-danger')
            } else if (letters && numbers && symbols && pwdLenght > 32) {
                event.preventDefault();
                warningText.classList.remove('d-none');
                warningText.innerHTML = 'Password troppo lunga per evitare ripetizioni';
                htmlElementPwdLength.classList.add('border-danger')
            }
        }
    })

    function resetInputStyle() {
        const warningText = document.getElementById('warning-text');
        const htmlElementPwdLength = document.getElementById('pwdLength');
        const htmlElementLetters = document.getElementById('letters');
        const htmlElementNumbers = document.getElementById('numbers');
        const htmlElementSymbols = document.getElementById('symbols');

        warningText.classList.add('d-none');
        htmlElementPwdLength.classList.remove('border-danger');
        htmlElementLetters.classList.remove('border-danger');
        htmlElementNumbers.classList.remove('border-danger');
        htmlElementSymbols.classList.remove('border-danger');
    }
</script>

<style>
    .container-fluid {
        background-color: #f8f9fa;
        border-radius: 16px;
        padding: 2rem;
        margin: 2rem;
        max-width: 1400px;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        background-color: #222222;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>