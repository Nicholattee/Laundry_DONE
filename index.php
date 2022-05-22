<?php
session_start();
# jika saat load halaman ini, pastikan telah login sbg user
if (!isset($_SESSION["user"])) {
    header("location:login.php");
}
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<div class="tenor-gif-embed" data-postid="25216863" data-share-method="host" data-aspect-ratio="1.16364" data-width="100%"><a href="https://tenor.com/view/girl-vibe-vibing-jam-jamming-gif-25216863">Girl Vibe GIF</a>from <a href="https://tenor.com/search/girl-gifs">Girl GIFs</a></div> <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
    
</body>
</html>

