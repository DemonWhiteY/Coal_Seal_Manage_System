<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Number Forms</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .form-container {
            margin-bottom: 20px;
        }

        .controls {
            display: flex;
            align-items: center;
        }

        .number {
            margin: 0 5px;
            font-size: 24px;
            width: 60px;
            text-align: center;
        }

        button {
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="number"] {
            width: 60px;
            padding: 5px;
            font-size: 24px;
            text-align: center;
            margin: 0 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php for ($i = 0; $i < 5; $i++): ?>
            <div class="form-container">
                <div class="controls">
                    <button id="decrement-<?php echo $i; ?>">-</button>
                    <input type="number" id="number-<?php echo $i; ?>" class="number" value="0">
                    <button id="increment-<?php echo $i; ?>">+</button>
                </div>
                <button id="submit-<?php echo $i; ?>">Submit</button>
                <form id="numberForm-<?php echo $i; ?>" action="newpage.php" method="GET" style="display: none;">
                    <input type="hidden" name="number" id="hiddenNumber-<?php echo $i; ?>" value="0">
                </form>
            </div>
        <?php endfor; ?>
    </div>

    <script>
        <?php for ($i = 0; $i < 5; $i++): ?>
            document.getElementById('increment-<?php echo $i; ?>').addEventListener('click', () => {
                let numberInput = document.getElementById('number-<?php echo $i; ?>');
                numberInput.value = parseInt(numberInput.value) + 1;
                document.getElementById('hiddenNumber-<?php echo $i; ?>').value = numberInput.value;
            });

            document.getElementById('decrement-<?php echo $i; ?>').addEventListener('click', () => {
                let numberInput = document.getElementById('number-<?php echo $i; ?>');
                numberInput.value = parseInt(numberInput.value) - 1;
                document.getElementById('hiddenNumber-<?php echo $i; ?>').value = numberInput.value;
            });

            document.getElementById('number-<?php echo $i; ?>').addEventListener('input', () => {
                let numberInput = document.getElementById('number-<?php echo $i; ?>');
                document.getElementById('hiddenNumber-<?php echo $i; ?>').value = numberInput.value;
            });

            document.getElementById('submit-<?php echo $i; ?>').addEventListener('click', () => {
                document.getElementById('numberForm-<?php echo $i; ?>').submit();
            });
        <?php endfor; ?>
    </script>
</body>

</html>