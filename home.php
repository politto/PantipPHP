<?php

// session_start();
// if (isset($_SESSION["
// "])) {
//     $id = $_SESSION["id"];
// }

$filename = "counter.txt";
if (file_exists($filename)) {
    $fp = fopen($filename, "r");
    $counter = fgets($fp, 99);
    fclose($fp);
} else {
    $counter = 0;
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
    <title>Tanpip - Learn, Share and Fun</title>

</head>

<body class="bg-[rgb(60,57,99)] text-white">
    <main class="mx-auto p-4 w-[90%]  flex items-center flex-col gap-4">
        <section class="h-[10em] border-2 border-white rounded-xl w-full flex items-center flex-col justify-center">
            <p class="text-6xl font-bold text-yellow-400 ">Tanpip</p>
            <p class="  text-center">😄 Learn, share and fun</p>
        </section>

        <section class="w-full flex items-center flex-col gap-4">
            <p class="text-2xl">กระทู้ทั้งหมดที่มี: <?php echo $counter; ?></p>
            <p class="text-2xl">🎉🎉🎉</p>
            <a href="create.php"
                class="bg-green-600 hover:bg-green-700 rounded px-4 py-2 self-end flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-plus">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>
                สร้างกระทู้ใหม่
            </a>
            <?php

            for ($i = 0; $i < $counter; $i++) {
                $lines = file("posts/header/$i.txt");

                $topicName = $lines[0];
                $creator = $lines[1];
                $createdDT = $lines[2];

                echo "
                    <div class = \"w-full flex flex-col\">
                        <a class=\"border-2 border-white/40 hover:border-white/80 bg-[rgb(60,57,99)] hover:bg-[rgb(53,50,88)] p-4\" href = \"post.php?id=$i\">
                            <h1 class = \"text-2xl\">❔ $topicName</h1>
                            <p class = \"\">โพสต์โดย $creator | $createdDT</p>
                        </a>
                    </div>
                ";
            }
            ?>
        </section>


    </main>
</body>

</html>