<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>สร้างกระทู้ | Tanpip</title>

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
</head>

<?php
$topic = $_POST["topic"] ?? null;
$content = $_POST["content"] ?? null;
$creator = $_POST["creator"] ?? null;

date_default_timezone_set("Asia/Bangkok");
$counterFileName = "counter.txt";

if ($topic != null || $content != null || $creator != null) {
	// read counter
	if (file_exists($counterFileName)) {
		$fp = fopen($counterFileName, "r");
		$counter = fgets($fp, 99);
		fclose($fp);
	} else {
		$counter = 0;
	}

	// create new post
	$postId = $counter;
	$newPostFileName = "{$postId}.txt";
	$now = date("d-M-Y H:i:s");

	$headerFp = fopen("posts/header/$newPostFileName", "w");
	fwrite($headerFp, "$topic\n");
	fwrite($headerFp, "$creator\n");
	fwrite($headerFp, "$now\n");

	$contentFp = fopen("posts/content/$newPostFileName", "w");
	fwrite($contentFp, "$content");

	fclose($headerFp);
	fclose($contentFp);

	// update counter
	$fp = fopen($counterFileName, "w");
	$counter += 1;
	fwrite($fp, $counter);
	fclose($fp);

	header("Location: post.php?id=$postId");
	exit();
}
?>

<body class="bg-[rgb(60,57,99)] text-white">
	<main class="mx-auto p-4 w-[90%]  flex items-center flex-col gap-4">
        <a href="home.php" class="bg-green-600 hover:bg-green-700 rounded px-4 py-2 self-start flex justify-center items-center gap-2">
             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-arrow-left">
                <path d="m12 19-7-7 7-7" />
                <path d="M19 12H5" />
            </svg>
            กลับ
        </a>
		<section class="h-[10em] border-2 border-white rounded-xl w-full flex items-center flex-col justify-center">
			<p class="text-6xl font-bold text-yellow-400 ">สร้างกระทู้</p>
			<p class="text-center">😄 Tanpip - Learn, share and fun</p>
		</section>

		<form class="w-full flex flex-col gap-4 bg-[#193366] border border-[#282341] p-8 caret-white rounded-lg"
			action="create.php" method="post">
			<div class="flex flex-col gap-2">
				<label for="topic">หัวข้อ</label>
				<input class="p-2 rounded bg-[#335087] border border-[#5B79B4]" name="topic" placeholder="หัวข้อกระทู้">
			</div>
			<div class="flex flex-col gap-2">
				<label for="content">เนื้อหา</label>
				<textarea class="p-2 rounded bg-[#335087] border border-[#5B79B4]" name="content"
					placeholder="รายละเอียดกระทู้" rows="10"></textarea>
			</div>
			<div class="flex flex-col gap-2">
				<label for="creator">ชื่อผู้ตั้งกระทู้</label>
				<input class="p-2 rounded bg-[#335087] border border-[#5B79B4]" name="creator"
					placeholder="ชื่อผู้ตั้งกระทู้">
			</div>
			<button class="bg-green-600 border border-green-800 w-max py-2 px-4 rounded self-end"
				type="submit">ส่งกระทู้</button>
		</form>


	</main>
</body>

</html>