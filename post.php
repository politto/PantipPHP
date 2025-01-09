<?php
$filename = "posts/".$_GET["id"] . ".txt";
if (file_exists($filename)) {
    $fp = fopen($filename, "r");
    $counter = fgets($fp, 99);
    fclose($fp);
} else {
    $counter = 0;
    echo "file not foud";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- set icon from image in the same dir -->
    <link rel="icon" href="happy_icon.png">
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        * {
            font-family: 'Kanit', sans-serif;
            color: white;
        }
    </style>

    <script src="https://cdn.tailwindcss.com"></script>
    <?php
    $lines = file("posts/".$_GET["id"].".txt");

    echo "<title>$lines[0]</title>";
    ?>
</head>

<body class = "bg-[rgb(60,57,99)] text-white">
    <main class="mx-auto p-4 w-[90%]  flex items-center flex-col gap-4">
        <section class="w-full flex items-center flex-col gap-4 bg-blue-800 p-8 border-slate-400 border-[1px] rounded-sm">
            <?php
            $lines = file("posts/".$_GET["id"].".txt");

            $creator = $lines[1];
            $createdDT = $lines[2];
            echo "<div class = \"w-full flex flex-col p-2 \">";
            for ($j = 0; $j <= sizeof($lines) - 1; $j++) {
                $ptext = $lines[$j];
                switch ($j) {
                    case 0:
                        echo "<div class = \"mb-8\"><h1 class = \"text-2xl text-yellow-400\"> $ptext</h1></div>";
                        break;
                    case 1:
                    case 2:
                     break;
                    default:
                        echo "<p class = \"\">$ptext</p>";
                        break;
                    
                }
            }
            echo "<div class = \"mt-8 flex flex-row gap-4\"><div class = \"text-4xl text-center\">😄</div>";
            echo "<div><p class = \"\">$creator</p>";
            echo "<p class = \"\">$createdDT</p></div>";
            echo "</div>";
            ?>
        </section>
    </main>
</body>

</html>