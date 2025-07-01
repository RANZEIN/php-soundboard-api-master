<?php
function fetch_api($endpoint, $params = []) {
    $base_url = "http://localhost:8080/flask_app/myinstants-api-main/";
    $url = $base_url . $endpoint . '?' . http_build_query($params);
    $json = file_get_contents($url);
    return json_decode($json, true);
}

$tab = $_GET['tab'] ?? 'trending';
$q = $_GET['q'] ?? '';
$data = [];

if ($tab == 'trending') {
    $data = fetch_api('trending.php', ['q' => 'id'])['data'] ?? [];
} elseif ($tab == 'recent') {
    $data = fetch_api('recent.php', ['q' => 'id'])['data'] ?? [];
} elseif ($tab == 'search' && $q) {
    $data = fetch_api('search.php', ['q' => $q])['data'] ?? [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyInstants Soundboard</title>
    <style>
        body {
            font-family: 'Comic Sans MS', 'Comic Sans', cursive, Arial, sans-serif;
            background: linear-gradient(135deg, #f9d423 0%, #ff4e50 100%);
            margin: 0;
            min-height: 100vh;
        }
        nav {
            background: linear-gradient(90deg, #36d1c4 0%, #5b86e5 100%);
            padding: 1em 0;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 1.5em;
            font-size: 1.2em;
            font-weight: 700;
            letter-spacing: 1px;
            transition: color 0.2s, text-shadow 0.2s;
            text-shadow: 1px 1px 6px #0002;
        }
        nav a.active, nav a:hover {
            color: #ffeb3b;
            text-shadow: 2px 2px 8px #ff4e50aa;
        }
        main {
            max-width: 900px;
            margin: 2em auto;
            background: rgba(255,255,255,0.95);
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.13);
            padding: 2.5em 2em 2em 2em;
            position: relative;
        }
        h1 {
            color: #ff4e50;
            font-size: 2.5em;
            text-align: center;
            margin-bottom: 1.2em;
            letter-spacing: 2px;
            text-shadow: 2px 2px 10px #f9d42355;
        }
        .soundboard-list {
            display: flex;
            flex-wrap: wrap;
            gap: 2em;
            justify-content: center;
        }
        .sound-item {
            background: linear-gradient(135deg, #f7971e 0%, #ffd200 100%);
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(255,78,80,0.13);
            padding: 1.2em 1em 1.5em 1em;
            width: 220px;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.18s, box-shadow 0.18s;
            border: 3px solid #fffbe7;
            position: relative;
            overflow: hidden;
        }
        .sound-item:hover {
            transform: scale(1.07) rotate(-2deg);
            box-shadow: 0 8px 32px #ff4e5077;
            border-color: #ffeb3b;
        }
        .sound-title {
            font-weight: 800;
            margin-bottom: 0.7em;
            text-align: center;
            color: #ff4e50;
            font-size: 1.15em;
            letter-spacing: 1px;
            text-shadow: 1px 1px 8px #fffbe7;
        }
        audio {
            width: 180px;
            outline: none;
            margin-bottom: 0.5em;
            background: #fffbe7;
            border-radius: 8px;
            box-shadow: 0 1px 4px #ffd20055;
        }
        .search-form {
            display: flex;
            gap: 0.5em;
            margin-bottom: 2em;
            justify-content: center;
        }
        .search-form input[type="text"] {
            flex: 1;
            padding: 0.7em;
            border: 2px solid #ffd200;
            border-radius: 8px;
            font-size: 1.1em;
            background: #fffbe7;
            color: #ff4e50;
            font-weight: 600;
            transition: border 0.2s;
        }
        .search-form input[type="text"]:focus {
            border: 2px solid #ff4e50;
            outline: none;
        }
        .search-form button {
            background: linear-gradient(90deg, #ff4e50 0%, #f9d423 100%);
            color: #fff;
            border: none;
            padding: 0.7em 1.5em;
            border-radius: 8px;
            font-size: 1.1em;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 2px 8px #ff4e5044;
            transition: background 0.2s, color 0.2s;
        }
        .search-form button:hover {
            background: linear-gradient(90deg, #f9d423 0%, #ff4e50 100%);
            color: #ff4e50;
        }
        .sound-item::after {
            content: "🎵";
            position: absolute;
            right: 12px;
            top: 10px;
            font-size: 2em;
            opacity: 0.18;
            pointer-events: none;
        }
        @media (max-width: 600px) {
            main { padding: 1em; }
            .sound-item { width: 100%; }
            .soundboard-list { gap: 1em; }
        }
    </style>
</head>
<body>
<nav>
    <a href="?tab=trending" class="<?= $tab == 'trending' ? 'active' : '' ?>">Trending</a>
    <a href="?tab=recent" class="<?= $tab == 'recent' ? 'active' : '' ?>">Recent</a>
    <a href="?tab=search" class="<?= $tab == 'search' ? 'active' : '' ?>">Search</a>
</nav>
<main>
    <?php if ($tab == 'trending'): ?>
        <h1>Trending Soundboard</h1>
    <?php elseif ($tab == 'recent'): ?>
        <h1>Recent Soundboard</h1>
    <?php elseif ($tab == 'search'): ?>
        <h1>Search Soundboard</h1>
        <form method="get" class="search-form">
            <input type="hidden" name="tab" value="search">
            <input type="text" name="q" placeholder="Search soundboard..." value="<?= htmlspecialchars($q) ?>" required>
            <button type="submit">Search</button>
        </form>
    <?php endif; ?>

    <div class="soundboard-list">
        <?php if ($data): ?>
            <?php foreach ($data as $sound): ?>
                <div class="sound-item">
                    <div class="sound-title"><?= htmlspecialchars($sound['title']) ?></div>
                    <audio controls src="<?= htmlspecialchars($sound['mp3']) ?>"></audio>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>
                <?php
                if ($tab == 'search' && $q) {
                    echo "No soundboard found for '" . htmlspecialchars($q) . "'.";
                } else {
                    echo "No soundboard found.";
                }
                ?>
            </p>
        <?php endif; ?>
    </div>
</main>
</body>
</html>
