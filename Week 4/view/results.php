<main class="main-results">

    <?php
    function generateMathTable($num, $operation)
    {
        $cards = "";
        for ($i = 1; $i <= 12; $i++) {
            switch ($operation) {
                case "add":
                    $result = $num + $i;
                    $symbol = "+";
                    break;
                case "subtract":
                    $result = $num - $i;
                    $symbol = "-";
                    break;
                case "divide":
                    $result = number_format($num / $i, 2);
                    $symbol = "/";
                    break;
                default:
                    $result = $num * $i;
                    $symbol = "*";
                    break;
            }

            $cards .= "<div class='card' tabindex='0'>
                      <div class='card-inner'>
                          <div class='card-front'>{$num} {$symbol} {$i}</div>
                          <div class='card-back'>{$result}</div>
                      </div>
                   </div>";
        }
        return $cards;
    }
    echo generateMathTable($number, $operation);

    ?>

</main>