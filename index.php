<?php
session_start();
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <link rel="shortcut icon" type="image" href="assets/img/favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Headshot Haven</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/56e72382bd.js" crossorigin="anonymous"></script>
    <script src="assets/js/aimtraining.js"></script>
    <!--icon for few arrows im using-->
    <link rel="stylesheet" href="styles.css">
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="77">
    <?php include('assets/navbar.php'); ?>
    <!--Top page-->
    <header class="masthead" style="background-image:url('assets/img/setup.jpg'); ">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <a class="navbar-brand" href="index.php"><br><br><br><br>
                            <img src="assets/img/headshot-haven.svg" width="700" height="auto" style="max-width: 100%; margin-bottom: 50px;">
                        </a><br>
                        <a class="custom-btn" href="#aim-training"><span>Start</span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="aim-training" class="text-center content-section masthead">
        <div class="container">
            <video autoplay muted loop id="header-video">
                <source src="assets/video/pulse.mp4" type="video/mp4">
            </video>
            <div class="row">
                <div class="map-clean text-center">
                    <div id="section-title">
                        <h2>Personal Best: <span id="personalBest">0</span></h2>
                        <h4 id="accuracy">Accuracy: 0%</h4>
                        <h4><span id="timer">30.0</span> seconds</h4>
                    </div>
                    <canvas id="gameCanvas" width="1300" height="650"></canvas><br>
                    <div class="row">
                        <div class="col" style="display: flex; align-items: center;">
                            <span style="margin-right: 8px;">Upload Crosshair:</span>
                            <a id="file-btn">
                                <svg viewBox="0 0 256 256" height="32" width="38" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M74.34 85.66a8 8 0 0 1 11.32-11.32L120 108.69V24a8 8 0 0 1 16 0v84.69l34.34-34.35a8 8 0 0 1 11.32 11.32l-48 48a8 8 0 0 1-11.32 0ZM240 136v64a16 16 0 0 1-16 16H32a16 16 0 0 1-16-16v-64a16 16 0 0 1 16-16h52.4a4 4 0 0 1 2.83 1.17L111 145a24 24 0 0 0 34 0l23.8-23.8a4 4 0 0 1 2.8-1.2H224a16 16 0 0 1 16 16m-40 32a12 12 0 1 0-12 12a12 12 0 0 0 12-12" fill="currentColor"></path>
                                </svg>
                            </a>
                            <input type="file" id="crosshair-upload" class="custom-btn" accept=".cur" style="display: none;">
                            <a href="http://www.rw-designer.com/gallery?search=crosshair" target="_blank" class="custom-file-upload text-black" style="text-decoration: none; margin-top: 2px; margin-left: 8px;">Find crosshairs
                                here</a>
                        </div>
                        <div class="col">
                            <button id="startButton" class="custom-btn">Start Game</button>
                        </div>
                        <div class="col" style="display: flex; justify-content: flex-end;">
                            <i class="fas fa-sync-alt custom-icon" onclick="location.reload()" title="Refresh" style="font-size: 36px; color: orange; cursor: pointer; margin-right: 6px;"></i>
                            <i id="fullScreenButton" class="fas fa-expand custom-icon" onclick="toggleFullScreen()" title="Full Screen" style="font-size: 36px; color: orange; cursor: pointer;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('file-btn').addEventListener('click', function() {
            document.getElementById('crosshair-upload').click();
        });
    </script>
    <script src="assets/js/import-cursor.js"></script>

    <section class="text-center content-section masthead" id="leaderboard" style="background-image:url('assets/img/ai.jpg');">
        <div class="container">
            <div id="section-title">
                <h2 id=>Aim Leaderboard</h2>
            </div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Player</th>
                        <th>Score</th>
                        <th>Accuracy</th>
                    </tr>
                </thead>
                <tbody id="leaderboardBody">
                    <!-- Leaderboard data will be dynamically populated here -->
                </tbody>
            </table>
        </div>
    </section>

    <!-- CPS Test section -->
    <section id="cps" class="text-center content-section masthead" style="background-color: black;">
        <div class="container">
            <div class="row">
                <div class="map-clean text-center">
                    <div id="section-title">
                        <h2>Personal Best: <span id="CPS-Best">0</span></h2>
                        <h4>Final CPS: <span id="finalCPS"></span></h4>
                        <h4>Clicks: <span id="cpsCount"></span></h4>
                        <h4><span id="cpsTimer">10.0</span> seconds</h4>
                    </div>
                    <canvas id="cpsCanvas" width="1000" height="500"></canvas><br>
                    <div class="row">
                        <div class="col-lg-7">
                            <!-- Make the column with the Start CPS Test button wider on larger screens -->
                            <div class="text-end">
                                <!-- Align the Start CPS Test button to the right side -->
                                <button id="startCPSButton" class="custom-btn">Start CPS Test</button>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-center">
                            <!-- Make the column with the icons smaller on larger screens -->
                            <i class="fas fa-sync-alt custom-icon" onclick="location.reload()" title="Refresh" style="font-size: 36px; color: orange; margin-right: 8px;"></i>
                            <i id="fullScreenButton" class="fas fa-expand custom-icon" onclick="toggleFullScreen()" title="Full Screen" style="font-size: 36px; color: orange;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="text-center content-section masthead" id="cpsleaderboard" style="background-image:url('assets/img/orange-typo.jpg');">
        <div class="container">
            <div id="section-title">
                <h2>CPS Leaderboard</h2>
            </div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Player</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody id="cpsLeaderboardBody">
                    <!-- Leaderboard data will be dynamically populated here -->
                </tbody>
            </table>
        </div>
    </section>

    <!-- Reaction Speed Test section -->
    <section id="reaction-speed" class="text-center content-section masthead" style="background-color: black;">
        <div class="container">
            <div class="row">
                <div class="map-clean text-center">
                    <div id="section-title">
                        <h2>Reaction Speed Test</h2>
                        <h4>Personal Best: <span id="reaction-Best">0</span> ms</h4>
                    </div>
                    <div class="canvas-wrapper">
                        <canvas id="reactionCanvas" width="1000" height="500"></canvas>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-7 col-12 text-end mb-2 mb-lg-0">
                            <button id="startReactionButton" class="custom-btn">Start Reaction Test</button>
                        </div>
                        <div class="col-lg-4 col-12 d-flex justify-content-center">
                            <i id="fullScreenButton" class="fas fa-expand custom-icon" onclick="toggleFullScreen()" title="Full Screen" style="font-size: 36px; color: orange;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="text-center content-section masthead" id="reaction-leaderboard" style="background-image:url('assets/img/scene.jpg');">
        <div class="container">
            <div id="section-title">
                <h2>Reaction Speed Test Leaderboard</h2>
            </div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Player</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody id="reactionLeaderboardBody">
                    <!-- Leaderboard data will be dynamically populated here -->
                </tbody>
            </table>
        </div>
    </section>

    <section class="text-center content-section masthead" id="weapon-spec" style="height: 700px; background-color: black;">
        <div class="container">
            <div id="section-title">
                <h2>Valorant Weapons</h2>
            </div>
            <table id="weapons-table" class="custom-table">
                <thead>
                    <tr>
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Head Damage</th>
                        <th>Body Damage</th>
                        <th>Leg Damage</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </section>

    <style>

    </style>

    <!-- Roulette wheel section -->
    <section class="text-center content-section masthead" id="roulette" style="background-image:url('assets/img/orange4.jpg')">
        <div class="container">
            <div id="section-title">
                <h2>Switch it up &#128526;</h2>
            </div>
            <canvas id="canvas" width="600" height="600"></canvas><br>
            <a type="button" value="spin" class="custom-btn" id='spin'>Spin</a>
        </div>
        <script src="assets/js/roulette.js"></script>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('get_reaction_leaderboard.php')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const reactionLeaderboardBody = document.getElementById('reactionLeaderboardBody');
                        data.leaderboard.forEach(entry => {
                            const row = `<tr><td>${entry.username}</td><td>${entry.score} ms</td></tr>`;
                            reactionLeaderboardBody.innerHTML += row;
                        });
                    } else {
                        console.error('Failed to fetch leaderboard data:', data.message);
                    }
                })
                .catch(error => {
                    console.error('Error fetching leaderboard data:', error);
                });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('get_cps_score.php')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const cpsScoreContainer = document.getElementById('CPS-Best');
                        cpsScoreContainer.innerHTML = `${data.cpsScore}` + " CPS";
                    } else {
                        console.error('Failed to fetch CPS score:', data.message);
                    }
                })
                .catch(error => {
                    console.error('Error fetching CPS score:', error);
                });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('get_cps_leaderboard.php')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const cpsLeaderboardBody = document.getElementById('cpsLeaderboardBody');
                        data.leaderboard.forEach(entry => {
                            const row = `<tr><td>${entry.username}</td><td>${entry.score}</td></tr>`;
                            cpsLeaderboardBody.innerHTML += row;
                        });
                    } else {
                        console.error('Failed to fetch CPS leaderboard data:', data.message);
                    }
                })
                .catch(error => {
                    console.error('Error fetching CPS leaderboard data:', error);
                });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('get_leaderboard.php')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const leaderboardBody = document.getElementById('leaderboardBody');
                        data.leaderboard.forEach(entry => {
                            const row =
                                `<tr><td>${entry.username}</td><td>${entry.score}</td><td>${entry.accuracy}%</td></tr>`;
                            leaderboardBody.innerHTML += row;
                        });
                    } else {
                        console.error('Failed to fetch leaderboard data:', data.message);
                    }
                })
                .catch(error => {
                    console.error('Error fetching leaderboard data:', error);
                });
        });
    </script>

    <script>
        // Example function to update the score for Aim Training
        function updateAimTrainingScore(score) {
            fetch('update_score.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        score: score
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Aim Training score updated successfully');
                    } else {
                        console.error('Error updating Aim Training score:', data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>

    <script>
        // Example function to update the score for CPS
        function updateCpsScore(score) {
            fetch('update_cps_score.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        score: score
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('CPS score updated successfully');
                    } else {
                        console.error('Error updating CPS score:', data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>

    <script>
        function toggleFullScreen() {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen().catch((err) => {
                    alert(`Error attempting to enable full-screen mode: ${err.message} (${err.name})`);
                });
            } else {
                document.exitFullscreen();
            }
        }
    </script>
    <script src="assets/js/reactiontest.js"></script>
    <script src="assets/js/cps.js"></script>
    <script src="assets/js/weaponstats.js"></script>
    <?php include('assets/footer.php'); ?>

    <!--Bugs out if its in the head tag idk why-->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/navbar.js"></script>
</body>

</html>