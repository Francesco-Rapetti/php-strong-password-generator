<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    function addChars($output, $chars, $singlePart, $repetitions): string
    {
        for ($i = 0; $i < $singlePart; $i++) {
            $index = rand(0, strlen($output) - 1);
            $newChar = $chars[rand(0, strlen($chars) - 1)];
            if ($output[$index] !== ' ') {
                $i--;
                continue;
            }

            if (!$repetitions && str_contains($output, $newChar)) {
                $i--;
                continue;
            }

            if ($output[$index] === ' ') {
                $output[$index] = $newChar;
            } else {
                $i--;
                continue;
            }
        }

        return $output;
    }

    function generatePassword(): string
    {
        $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $symbols = '!@#$%^&*()_+';
        $pwdLength = $_GET['pwdLength'];
        $repetitions = $_GET['moreChar'];
        $includeLetters = $_GET['letters'] ?? 'notInclude';
        $includeNumbers = $_GET['numbers'] ?? 'notInclude';
        $includeSymbols = $_GET['symbols'] ?? 'notInclude';
        $output = '';
        $parts = 0;

        $includeLetters === 'include' ? $parts++ : '';
        $includeNumbers === 'include' ? $parts++ : '';
        $includeSymbols === 'include' ? $parts++ : '';

        $singlePart = floor($pwdLength / $parts);

        for ($i = 0; $i < $pwdLength; $i++) {
            $output .= ' ';
        }

        if ($includeLetters === 'include') {
            $output = addChars($output, $letters, $singlePart, $repetitions === 'yes');
        }

        if ($includeNumbers === 'include') {
            $output = addChars($output, $numbers, $singlePart, $repetitions === 'yes');
        }

        if ($includeSymbols === 'include') {
            $output = addChars($output, $symbols, $singlePart, $repetitions === 'yes');
        }

        if ($pwdLength % $parts !== 0) {
            if ($includeLetters === 'include') {
                $output = addChars($output, $letters, $pwdLength % $parts, $repetitions === 'yes');
            } elseif ($includeNumbers === 'include') {
                $output = addChars($output, $numbers, $pwdLength % $parts, $repetitions === 'yes');
            } elseif ($includeSymbols === 'include') {
                $output = addChars($output, $symbols, $pwdLength % $parts, $repetitions === 'yes');
            }
        }

        return $output;
    }
    ?>

    <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-center flex-wrap overflow-auto">
            <h1 class="w-100 text-center"><?php echo generatePassword() ?></h1>
        </div>
    </div>
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