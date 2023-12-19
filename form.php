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
                        <input class="form-control" type="number" name="" id="">
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
                        <input class="form-check-input" type="checkbox" id="letters">
                        <label class="form-check-label" for="letters">
                            Lettere
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="numbers">
                        <label class="form-check-label" for="numbers">
                            Numeri
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="symbols">
                        <label class="form-check-label" for="symbols">
                            Simboli
                        </label>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mb-3">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Genera</button>
                    <button type="reset" class="btn btn-secondary">Annulla</button>
                </div>
            </div>
        </form>
</body>

</html>

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