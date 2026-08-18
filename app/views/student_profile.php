<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile | LavaLust</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600;700;800&family=Unbounded:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --lava: #dd4814;
            --lava-dim: #b83a10;
            --lava-glow: rgba(221,72,20,0.18);
            --bg: #0a0a0b;
            --bg2: #111113;
            --bg3: #18181b;
            --card: rgba(17,17,19,0.9);
            --border: rgba(255,255,255,0.08);
            --border-hot: rgba(221,72,20,0.35);
            --text: #f4f4f5;
            --text-muted: #a1a1aa;
            --mono: 'Fira Code', monospace;
            --sans: 'Unbounded', sans-serif;
        }

        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            font-family: var(--sans);
            background: var(--bg);
            color: var(--text);
            background-image:
                linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px),
                radial-gradient(circle at top left, rgba(221,72,20,0.18), transparent 30%),
                radial-gradient(circle at bottom right, rgba(221,72,20,0.12), transparent 25%);
            background-size: 42px 42px, 42px 42px, 100% 100%, 100% 100%;
        }

        .topbar {
            position: sticky;
            top: 0;
            backdrop-filter: blur(12px);
            background: rgba(10,10,11,0.75);
            border-bottom: 1px solid var(--border);
            z-index: 10;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 72px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-size: 1.05rem;
            color: var(--text);
            text-decoration: none;
            font-weight: 700;
        }

        .brand-mark {
            width: 28px;
            height: 28px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: var(--lava);
            box-shadow: 0 0 20px var(--lava-glow);
            font-size: 0.9rem;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.8rem;
            padding: 9px 12px;
            border-radius: 8px;
            transition: 0.2s ease;
        }

        .nav-links a:hover {
            color: var(--text);
            background: rgba(255,255,255,0.03);
        }

        .nav-links .primary {
            color: #fff;
            background: var(--lava);
            border: 1px solid var(--border-hot);
            box-shadow: 0 0 18px var(--lava-glow);
        }

        .wrap {
            padding: 72px 0 80px;
        }

        .card {
            max-width: 820px;
            margin: 0 auto;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
            box-shadow: 0 24px 60px rgba(0,0,0,0.35);
            overflow: hidden;
        }

        .card-header {
            padding: 30px 32px 18px;
            border-bottom: 1px solid var(--border);
        }

        .eyebrow {
            font-family: var(--mono);
            color: #fbbf24;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }

        h1 {
            margin-top: 12px;
            margin-bottom: 0;
            font-size: clamp(2rem, 4vw, 3rem);
            letter-spacing: -0.04em;
        }

        .profile-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(220px, 1fr));
            gap: 18px;
            padding: 28px 32px 10px;
        }

        .info-box {
            padding: 18px 18px;
            border-radius: 12px;
            background: rgba(255,255,255,0.02);
            border: 1px solid var(--border);
        }

        .label {
            font-family: var(--mono);
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--text-muted);
            margin-bottom: 8px;
        }

        .value {
            font-size: 1.05rem;
            line-height: 1.5;
            color: var(--text);
        }

        .card-footer {
            padding: 18px 32px 30px;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 700;
            border: 1px solid var(--border);
            background: rgba(255,255,255,0.02);
            color: var(--text);
            transition: 0.2s ease;
        }

        .btn:hover {
            background: rgba(255,255,255,0.05);
        }

        .btn-primary {
            background: var(--lava);
            border-color: var(--border-hot);
            box-shadow: 0 0 18px var(--lava-glow);
            color: #fff;
        }

        @media (max-width: 640px) {
            .profile-grid {
                grid-template-columns: 1fr;
            }

            .nav {
                flex-direction: column;
                padding: 16px 0;
                gap: 12px;
            }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <div class="container nav">
            <a href="<?= site_url('student'); ?>" class="brand">
                <span class="brand-mark">L</span>
                <span>LavaLust Student</span>
            </a>
            <nav class="nav-links">
                <a href="<?= site_url('student'); ?>">Home</a>
                <a class="primary" href="<?= site_url('student/profile'); ?>">Profile</a>
            </nav>
        </div>
    </header>

    <main class="container wrap">
        <section class="card">
            <div class="card-header">
                <div class="eyebrow">Student Record</div>
                <h1>Student Profile</h1>
            </div>

            <div class="profile-grid">
                <div class="info-box">
                    <div class="label">Student ID</div>
                    <div class="value"><?= $student['student_id']; ?></div>
                </div>
                <div class="info-box">
                    <div class="label">Name</div>
                    <div class="value"><?= $student['name']; ?></div>
                </div>
                <div class="info-box">
                    <div class="label">Course</div>
                    <div class="value"><?= $student['course']; ?></div>
                </div>
                <div class="info-box">
                    <div class="label">Year Level</div>
                    <div class="value"><?= $student['year']; ?></div>
                </div>
                <div class="info-box">
                    <div class="label">Section</div>
                    <div class="value"><?= $student['section']; ?></div>
                </div>
                <div class="info-box">
                    <div class="label">Email</div>
                    <div class="value"><?= $student['email']; ?></div>
                </div>
            </div>

            <div class="card-footer">
                <a class="btn btn-primary" href="<?= site_url('student'); ?>">Back to Home</a>
            </div>
        </section>
    </main>
</body>
</html>
