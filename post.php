<?php

$postId = $_GET["id"];
$header = file("posts/header/$postId.txt");
$contents = file("posts/content/$postId.txt");

$topicName = $header[0];
$creator = $header[1];
$createdDT = $header[2];
$content = "";

for ($i = 0; $i < count($contents); $i++) {
    $content .= $contents[$i];
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
    echo "<title>$topicName</title>";
    ?>
</head>

<body class="bg-[rgb(60,57,99)] text-white">
    <main class="mx-auto p-4 w-[90%]  flex items-center flex-col gap-4">
        <a href="home.php"
            class="bg-green-600 hover:bg-green-700 rounded px-4 py-2 self-start flex justify-center items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-arrow-left">
                <path d="m12 19-7-7 7-7" />
                <path d="M19 12H5" />
            </svg>
            กลับ
        </a>
        <section
            class="w-full flex items-center flex-col gap-4 bg-blue-800 p-8 border-slate-400 border-[1px] rounded-sm">
            <?php

            echo "
                <div class = \"w-full flex flex-col p-2 \">
                    <div class = \"mb-8\">
                        <h1 class = \"text-2xl text-yellow-400\">$topicName</h1>
                    </div>
                    <pre class=\"text-wrap\">$content</pre>
                    <div class = \"mt-8 flex flex-row gap-4\">
                        <div class = \"text-4xl text-center\">😄</div>
                    <div>
                    <p class = \"\">$creator</p>
                    <p class = \"\">$createdDT</p>
                </div>
            ";
            ?>
        </section>
    </main>
</body>

</html>