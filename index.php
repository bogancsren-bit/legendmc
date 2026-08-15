<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LegendMC - Hivatalos Weboldal & Webshop</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Teko:wght@500;700&family=Poppins:wght@400;600;800&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #0b0f19;
            color: #ffffff;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        /* --- Animációk --- */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes floatAnim {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .animate-reveal {
            animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        /* --- Fejléc --- */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 75px;
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(12px);
            border-bottom: 4px solid #1e293b;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 50px;
            z-index: 1000;
        }

        .logo-nav {
            font-family: 'Teko', sans-serif;
            font-size: 38px;
            font-weight: 700;
            color: #ffcc00;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-shadow: 3px 3px #000000;
            transition: 0.3s;
        }

        .logo-nav:hover {
            transform: scale(1.05);
        }

        .webshop-btn {
            background: #22c55e;
            border: 3px solid #15803d;
            box-shadow: inset 0 3px 0 rgba(255,255,255,0.4), 0 4px 10px rgba(0,0,0,0.5);
            color: white;
            padding: 8px 22px;
            cursor: pointer;
            font-weight: 800;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.2s ease;
        }

        .webshop-btn:hover {
            background: #4ade80;
            transform: translateY(-2px);
        }

        .webshop-btn:active {
            transform: translateY(2px);
            box-shadow: inset 0 3px 0 rgba(0,0,0,0.3);
        }

        /* --- Hero Szekció --- */
        .hero-section {
            min-height: 100vh;
            background: linear-gradient(180deg, rgba(11,15,25,0.5) 0%, rgba(11,15,25,0.95) 90%, #0b0f19 100%), 
                        url('https://images.unsplash.com/photo-1542751371-adc38448a05e?q=80&w=1920&auto=format&fit=crop') no-repeat center center/cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 100px 20px 40px 20px;
        }

        .mc-rubric {
            background: #1c2333;
            border: 4px solid #334155;
            box-shadow: inset 0 0 0 2px #0f172a, 0 15px 35px rgba(0, 0, 0, 0.7);
            border-radius: 4px;
            padding: 40px;
            margin: 20px;
            max-width: 850px;
            width: 100%;
            transition: transform 0.4s ease, border-color 0.4s ease, box-shadow 0.4s ease;
        }

        .mc-rubric:hover {
            transform: translateY(-5px);
            border-color: #ffcc00;
        }

        h1 {
            font-family: 'Teko', sans-serif;
            font-size: 52px;
            letter-spacing: 1px;
            margin-bottom: 15px;
            color: #ffcc00;
            text-shadow: 3px 3px #000000;
        }

        .ip-box {
            font-size: 20px;
            margin: 12px 0;
            color: #4ade80;
            font-weight: 700;
            background: #0f172a;
            padding: 12px 24px;
            border: 2px dashed #22c55e;
            display: inline-block;
            cursor: pointer;
            transition: 0.2s;
            position: relative;
        }

        .ip-box:hover {
            background: #1e293b;
            border-color: #ffcc00;
            color: #ffcc00;
            transform: scale(1.02);
        }

        .discord-link {
            font-size: 16px;
            margin: 10px 0;
        }

        .discord-link a {
            color: #818cf8;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .discord-link a:hover {
            color: #a5b4fc;
            text-shadow: 0 0 10px rgba(129, 140, 248, 0.5);
        }

        /* --- XP Mérő --- */
        .xp-container {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .xp-bar-wrapper {
            width: 100%;
            max-width: 420px;
            background: #090d16;
            border: 3px solid #1e293b;
            border-radius: 4px;
            padding: 4px;
            position: relative;
            box-shadow: inset 0 2px 6px rgba(0,0,0,0.9);
        }

        .xp-bar-fill {
            height: 20px;
            background: linear-gradient(90deg, #16a34a, #4ade80);
            width: 100%;
            border-radius: 2px;
            box-shadow: 0 0 12px rgba(74, 222, 128, 0.5);
            transition: width 0.5s ease, background 0.5s ease;
        }

        .xp-bar-fill.offline {
            background: linear-gradient(90deg, #e11d48, #f43f5e);
            box-shadow: 0 0 12px rgba(244, 63, 94, 0.5);
            width: 100%;
        }

        .xp-level-text {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Teko', sans-serif;
            font-size: 20px;
            font-weight: 700;
            color: #55ff55;
            text-shadow: 2px 2px #000000;
            letter-spacing: 1px;
        }

        .xp-level-text.offline {
            color: #ff5555;
        }

        /* Szekciók */
        section {
            padding: 70px 20px;
            display: flex;
            justify-content: center;
        }

        h2 {
            font-family: 'Teko', sans-serif;
            font-size: 38px;
            letter-spacing: 1px;
            margin-bottom: 20px;
            color: #ffffff;
            text-transform: uppercase;
            text-shadow: 2px 2px #000000;
        }

        p {
            line-height: 1.7;
            color: #94a3b8;
            font-size: 15px;
        }

        .servers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-top: 25px;
        }

        .server-card {
            background: #0f172a;
            border: 2px solid #334155;
            padding: 20px;
            border-radius: 4px;
            text-align: left;
            transition: 0.3s;
        }

        .server-card:hover {
            border-color: #ffcc00;
            transform: translateY(-3px);
        }

        .server-card h3 {
            font-family: 'Teko', sans-serif;
            font-size: 26px;
            color: #ffcc00;
            margin-bottom: 8px;
            text-shadow: 2px 2px #000;
        }

        /* Footer */
        footer {
            background-color: #070911;
            border-top: 4px solid #1e293b;
            padding: 60px 40px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            gap: 30px;
        }

        .footer-left {
            text-align: left;
        }

        .footer-right {
            display: flex;
            gap: 15px;
        }

        .footer-right img {
            width: 85px;
            height: 85px;
            image-rendering: pixelated;
            animation: floatAnim 4s ease-in-out infinite;
            filter: drop-shadow(0 8px 12px rgba(0,0,0,0.5));
        }

        .footer-right img:nth-child(2) {
            animation-delay: 2s;
        }

        /* --- Modális ablak --- */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(5, 7, 12, 0.85);
            backdrop-filter: blur(8px);
            z-index: 2000;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal.show {
            opacity: 1;
        }

        .modal-content {
            background: linear-gradient(135deg, #232b3e, #141a29);
            border: 4px solid #475569;
            box-shadow: inset 0 0 0 2px #0f172a, 0 25px 50px rgba(0,0,0,0.9);
            border-radius: 6px;
            width: 90%;
            max-width: 950px;
            height: 85vh;
            display: flex;
            overflow: hidden;
            position: relative;
            transform: scale(0.9);
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .modal.show .modal-content {
            transform: scale(1);
        }

        .modal-close {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 28px;
            color: #ef4444;
            cursor: pointer;
            background: #1e293b;
            border: 2px solid #ef4444;
            width: 36px;
            height: 36px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 4px;
            transition: 0.2s;
            z-index: 10;
        }

        .modal-close:hover {
            background: #ef4444;
            color: white;
            transform: scale(1.1);
        }

        .modal-left {
            width: 38%;
            background: #111827;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 35px;
            border-right: 4px solid #334155;
            text-align: center;
        }

        .modal-right {
            width: 62%;
            padding: 45px;
            overflow-y: auto;
            background: #141a29;
        }

        .form-group {
            margin-bottom: 22px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 600;
            color: #cbd5e1;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 18px;
            background: #090d16;
            border: 2px solid #334155;
            border-radius: 4px;
            color: white;
            font-size: 15px;
            outline: none;
            transition: 0.3s;
        }

        .form-group input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.4);
        }

        .login-submit-btn {
            background: #2563eb;
            border: 3px solid #1d4ed8;
            color: white;
            padding: 14px;
            width: 100%;
            border-radius: 4px;
            font-weight: 800;
            font-size: 16px;
            cursor: pointer;
            box-shadow: inset 0 2px 0 rgba(255,255,255,0.3);
            transition: 0.2s;
        }

        .login-submit-btn:hover {
            background: #3b82f6;
            transform: translateY(-2px);
        }

        /* Shop belső menü */
        .shop-sidebar {
            width: 260px;
            background: #111827;
            border-right: 4px solid #334155;
            padding: 25px 20px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex-shrink: 0;
        }

        .user-head-avatar {
            width: 64px;
            height: 64px;
            image-rendering: pixelated;
            margin-bottom: 10px;
            border: 2px solid #ffcc00;
            border-radius: 4px;
        }

        .shop-menu-btn {
            background: #1e293b;
            border: 2px solid #334155;
            color: #94a3b8;
            padding: 12px 16px;
            text-align: left;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.25s ease;
        }

        .shop-menu-btn:hover {
            background: #334155;
            color: #ffffff;
            transform: translateX(4px);
        }

        .shop-menu-btn.active {
            background: #2563eb;
            border-color: #60a5fa;
            color: #ffffff;
            box-shadow: 0 0 15px rgba(37, 99, 235, 0.4);
        }

        .shop-main-content {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
            position: relative;
        }

        .shop-tab {
            display: none;
            opacity: 0;
            transform: translateY(15px);
            transition: opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1), transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .shop-tab.active-tab {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        /* Rangok Grid Stílusok */
        .ranks-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }

        .rank-card {
            background: #1c2333;
            border: 3px solid #334155;
            border-radius: 6px;
            padding: 20px;
            text-align: left;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.3s, box-shadow 0.3s;
        }

        .rank-card:hover {
            transform: translateY(-8px);
            border-color: #ffcc00;
            box-shadow: 0 12px 30px rgba(0,0,0,0.6), 0 0 15px rgba(255, 204, 0, 0.2);
        }

        .rank-title {
            font-family: 'Teko', sans-serif;
            font-size: 28px;
            color: #ffcc00;
            margin-bottom: 10px;
            border-bottom: 2px solid #334155;
            padding-bottom: 5px;
            letter-spacing: 1px;
            text-shadow: 2px 2px #000000;
        }

        .rank-desc {
            font-size: 13px;
            color: #cbd5e1;
            margin-bottom: 20px;
            white-space: pre-line;
            line-height: 1.6;
        }

        .rank-buttons {
            margin-top: auto;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .btn-style {
            border: 2px solid rgba(255,255,255,0.2);
            color: white;
            padding: 12px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 700;
            font-size: 13px;
            width: 100%;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: inset 0 2px 0 rgba(255,255,255,0.2);
        }

        .btn-style:hover {
            transform: translateY(-2px);
            filter: brightness(1.2);
            box-shadow: 0 6px 15px rgba(0,0,0,0.5);
        }

        .btn-blue { background: #2563eb; }
        .btn-green { background: #16a34a; }
        .btn-purple { background: #9333ea; }
        .btn-dark-purple { background: #6b21a8; }
        .btn-red { background: #dc2626; }

        @media (max-width: 768px) {
            header { padding: 0 20px; }
            .modal-content { flex-direction: column; height: 95vh; }
            .modal-left, .shop-sidebar { width: 100%; height: auto; border: none; border-bottom: 4px solid #334155; }
            .modal-right, .shop-main-content { width: 100%; }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="logo-nav">LEGENDMC</div>
        <button class="webshop-btn" onclick="openWebshopModal()">🛒 Webshop</button>
    </header>

    <!-- Hero Szekció -->
    <div class="hero-section">
        <div class="mc-rubric animate-reveal">
            <h1>👑 LegendMC Szerver</h1>
            <div class="ip-box" id="copyIpBtn" onclick="copyServerIp()" title="Kattints a másoláshoz!">🌐 IP: node2.hexaverse.hu:8029 <span style="font-size: 12px; color: #94a3b8; display: block;">(Kattints a másoláshoz)</span></div>
            <div class="discord-link">💬 Discord: <a href="https://discord.gg/vwwjwFeDvy" target="_blank">https://discord.gg/vwwjwFeDvy</a></div>

            <!-- XP Státusz -->
            <div class="xp-container">
                <div class="xp-bar-wrapper">
                    <div class="xp-bar-fill" id="xpBarFill"></div>
                    <div class="xp-level-text" id="xpLevelText">Állapot ellenőrzése...</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Játékmódok -->
    <section>
        <div class="mc-rubric animate-reveal">
            <h2>🌐 Játékmódok / Szervereink</h2>
            <p>Válaszd ki a számodra legszimpatikusabb játékmódot és ugorj bele a kalandba!</p>
            <div class="servers-grid">
                <div class="server-card">
                    <h3>⚔️ KitPvP</h3>
                    <p style="font-size: 13px;">Gyűjtsd össze a felszerelésed, teszteld a harci tudásod és győzd le az ellenfeleidet az arénában!</p>
                </div>
                <div class="server-card">
                    <h3>🏝️ SkyBlock</h3>
                    <p style="font-size: 13px;">Építsd fel a saját szigeted a semmiből, fejleszd a generátorokat és urald a gazdaságot!</p>
                </div>
                <div class="server-card">
                    <h3>🕵️ Bújócska</h3>
                    <p style="font-size: 13px;">Rejtőzködj el mesterien a pályán, vagy kapd el a többieket ebben a szórakoztató minigame-ben!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Termékek -->
    <section style="background: #0f1420;">
        <div class="mc-rubric animate-reveal">
            <h2>📦 Termékek</h2>
            <p>A webshopban elérhető a hivatalos <strong>LegendCoin</strong> fizetőeszköz, amelled különféle extrákat és rangokat vásárolhatsz meg a szerveren!</p>
        </div>
    </section>

    <!-- Szabályzat szekció -->
    <section>
        <div class="mc-rubric animate-reveal">
            <h2>📜 Szerverszabályzat</h2>
            <p>Kérünk, tarts be az alábbi alapvető szabályokat a kellemes játékélmény érdekében:</p>
            <ul style="text-align: left; margin-top: 15px; margin-left: 20px; color: #cbd5e1; font-size: 14px; line-height: 1.8;">
                <li>🚫 <strong>Szigorúan tilos bármilyen segédprogram (Hack/Cheat) használata!</strong></li>
                <li>💬 Ne káromkodj és tiszteld a többi játékost a chatben!</li>
                <li>🤝 A /trade rendszert használd üzleteléskor, a csalásokért felelősséget nem vállalunk.</li>
            </ul>
        </div>
    </section>

    <!-- Segítség -->
    <section style="background: #0f1420;">
        <div class="mc-rubric animate-reveal">
            <h2>❓ Segítség</h2>
            <p><strong>Hogyan csatlakozz a szerverhez?</strong> Nyisd meg a Minecraftodat, kattints a Többjátékos módra, add hozzá a szervert az IP címmel, majd lépj be és regisztrálj a <code>/register [jelszó] [jelszó]</code> paranccsal!</p>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-left">
            <h3 style="font-family: 'Teko', sans-serif; font-size: 28px; color: #ffcc00; margin-bottom: 5px; letter-spacing: 1px; text-shadow: 2px 2px #000;">🛠️ Miben segíthetünk?</h3>
            <p>📧 Email: bogancsren@gmail.com</p>
            <p>💬 Discord: <a href="https://discord.gg/vwwjwFeDvy" style="color: #818cf8; text-decoration: none;" target="_blank">https://discord.gg/vwwjwFeDvy</a></p>
        </div>
        <div class="footer-right">
            <img src="https://minotar.net/avatar/Steve/100.png" alt="MC Karakter 1">
            <img src="https://minotar.net/avatar/Alex/100.png" alt="MC Karakter 2">
        </div>
    </footer>

    <!-- WEBSHOP MODAL -->
    <div id="webshopModal" class="modal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeWebshopModal()">&times;</button>
            
            <!-- 1. Login View -->
            <div id="loginView" style="display: flex; width: 100%; height: 100%;">
                <div class="modal-left">
                    <div style="font-family: 'Teko', sans-serif; font-size: 32px; font-weight: 700; color: #ffcc00; margin-bottom: 15px; letter-spacing: 2px; text-shadow: 2px 2px #000;">LEGENDMC</div>
                    <img src="https://minotar.net/avatar/LegendMC/120.png" alt="LegendMC Logo" style="image-rendering: pixelated; margin-bottom: 15px; filter: drop-shadow(0 5px 10px rgba(0,0,0,0.5));">
                    <p style="font-size: 13px; color: #94a3b8;">Add meg a Minecraft felhasználónevedet a belépéshez és az egyenleged beolvasásához.</p>
                </div>
                <div class="modal-right">
                    <h2 style="margin-bottom: 25px; font-size: 32px;">🔐 Bejelentkezés</h2>
                    <div class="form-group">
                        <label>👤 Felhasználónév</label>
                        <input type="text" id="usernameInput" placeholder="Add meg a Minecraft neved...">
                    </div>
                    <button class="login-submit-btn" onclick="handleLogin()">🚀 BEJELENTKEZÉS</button>
                    <p style="margin-top: 18px; font-size: 13px; color: #f43f5e; cursor: pointer; font-weight: 600;" onclick="alert('Kérj segítséget a Discord szerverünkön!')">⚠️ Nem tudok belépni!</p>
                </div>
            </div>

            <!-- 2. Dashboard View -->
            <div id="shopDashboard" style="display: none; width: 100%; height: 100%;">
                <!-- Sidebar -->
                <div class="shop-sidebar">
                    <img id="userHead" src="https://minotar.net/avatar/Steve/64.png" alt="User Head" class="user-head-avatar">
                    <div style="font-weight: 700; color: #ffcc00; margin-bottom: 2px; font-size: 16px;" id="displayUser">👤 Üdv, Játékos</div>
                    <div style="font-size: 12px; color: #4ade80; margin-bottom: 15px; font-weight: 600;" id="displayRank">⭐ Rang: Alap</div>
                    
                    <button class="shop-menu-btn active" onclick="switchTab('tab-fooldal', event)">🏠 Főoldal</button>
                    <button class="shop-menu-btn" onclick="switchTab('tab-jutalom', event)">🎁 Napi jutalom</button>
                    <button class="shop-menu-btn" onclick="switchTab('tab-feltoltes', event)">💳 LegendCoin feltöltés</button>
                    <button class="shop-menu-btn" onclick="switchTab('tab-aktivalas', event)">🎟️ LegendCoin beaktiválás</button>
                    <button class="shop-menu-btn" onclick="switchTab('tab-utalás', event)">💸 LegendCoin utalás</button>
                    <button class="shop-menu-btn" onclick="switchTab('tab-rangok', event)">👑 Rang vásárlása</button>
                    <button class="shop-menu-btn" style="margin-top: auto; border-color: #ef4444; color: #ef4444;" onclick="handleLogout()">🚪 Kijelentkezés</button>
                </div>

                <!-- Content -->
                <div class="shop-main-content">
                    
                    <!-- Főoldal -->
                    <div id="tab-fooldal" class="shop-tab active-tab">
                        <h2 style="font-size: 32px;">🏠 Webshop Kezelőfelület</h2>
                        <p style="margin-top: 10px; color: #4ade80; font-weight: 700; font-size: 20px;" id="displayBalance">🪙 Egyenleg: Betöltés...</p>
                        <p style="margin-top: 20px;">Használd a bal oldali menüt a LegendCoinok kezeléséhez, a napi bónuszok átvételéhez és a rangok vásárlásához!</p>
                    </div>

                    <!-- Napi jutalom -->
                    <div id="tab-jutalom" class="shop-tab">
                        <h2 style="font-size: 32px;">🎁 Napi Ingyen Jutalom</h2>
                        <div class="mc-rubric" style="margin-top: 20px; width: 100%; max-width: 100%;">
                            <p>Gyűjts össze minden nap ingyenes <strong>LegendCoint</strong>!</p>
                            <div style="margin: 20px 0; font-size: 22px; color: #ffcc00; font-family: 'Teko', sans-serif;">✨ Napi ajándék: +150 LegendCoin</div>
                            <button id="claimBtn" class="btn-style btn-green" onclick="claimDailyReward()">🎁 Jutalom átvétele</button>
                        </div>
                    </div>

                    <!-- Feltöltés -->
                    <div id="tab-feltoltes" class="shop-tab">
                        <h2 style="font-size: 32px;">💳 LegendCoin feltöltés</h2>
                        <div class="mc-rubric" style="margin-top: 20px; width: 100%; max-width: 100%;">
                            <p>A LegendCoin vásárlás jelenleg nem működik. Ha szeretnél LegendCoint, lépj be a Discord szerverünkre és nyerj egy nyereményjátékot!</p>
                            <p style="margin-top: 15px;"><strong>💬 Discord:</strong> <a href="https://discord.gg/vwwjwFeDvy" target="_blank" style="color: #818cf8;">https://discord.gg/vwwjwFeDvy</a></p>
                        </div>
                    </div>

                    <!-- Beaktiválás -->
                    <div id="tab-aktivalas" class="shop-tab">
                        <h2 style="font-size: 32px;">🎟️ LegendCoin beaktiválás</h2>
                        <div class="mc-rubric" style="margin-top: 20px; width: 100%; max-width: 100%;">
                            <p>Ha van kuponkódod, írd be ide! (Próbáld ki a <code>LEGEND2026</code> kódot!)</p>
                            <div class="form-group" style="margin-top: 20px;">
                                <input type="text" id="couponInput" placeholder="🎟️ Írd ide a kupont vagy kódot...">
                            </div>
                            <button class="btn-style btn-green" onclick="activateCoupon()">✅ Aktiválás</button>
                        </div>
                    </div>

                    <!-- Utalás -->
                    <div id="tab-utalás" class="shop-tab">
                        <h2 style="font-size: 32px;">💸 LegendCoin utalás</h2>
                        <div class="mc-rubric" style="margin-top: 20px; width: 100%; max-width: 100%;">
                            <p>Keresd meg azt a játékost, akinek utalni szeretnél, írd be a nevét és az összeget!</p>
                            
                            <div class="form-group" style="margin-top: 15px;">
                                <input type="text" id="transferTarget" placeholder="👤 Címzett játékos neve">
                            </div>
                            <div class="form-group">
                                <input type="number" id="transferAmount" placeholder="🪙 Összeg (LegendCoin)">
                            </div>
                            <button class="btn-style btn-blue" onclick="sendMoney()">💸 Utalás elküldése</button>
                        </div>
                    </div>

                    <!-- Rangok -->
                    <div id="tab-rangok" class="shop-tab">
                        <h2 style="font-size: 32px;">👑 Rang vásárlása</h2>
                        
                        <div class="ranks-grid">
                            <!-- VIP -->
                            <div class="rank-card">
                                <div>
                                    <div class="rank-title">⭐ Vip rang</div>
                                    <div class="rank-desc">Vip rang, az egyik legkisebb rang!

<strong>Skyblock:</strong>
- 6 db generátor típusonként.
- /items-buy & /items-sell használat
- Felcsatlakozás ha tele a szerver

<strong>Kitpvp:</strong>
- Vip kit lekérdezése
- /heal (1x használat)</div>
                                </div>
                                <div class="rank-buttons">
                                    <button class="btn-style btn-blue" onclick="confirmPurchase('Vip (60 napos)', 1000)">⏳ 60 napos - 1000 LC</button>
                                    <button class="btn-style btn-green" onclick="confirmPurchase('Vip (Örök)', 5000)">♾️ Örök - 5000 LC</button>
                                </div>
                            </div>

                            <!-- Legend -->
                            <div class="rank-card">
                                <div>
                                    <div class="rank-title">⚡ Legend rang</div>
                                    <div class="rank-desc">Előző rang tulajdonságai.

<strong>Skyblock:</strong>
- /fly (A szigeteden)
- /nether-tp használat
- 10 db generátor típusonként</div>
                                </div>
                                <div class="rank-buttons">
                                    <button class="btn-style btn-blue" onclick="confirmPurchase('Legend (60 napos)', 4000)">⏳ 60 napos - 4000 LC</button>
                                    <button class="btn-style btn-green" onclick="confirmPurchase('Legend (Örök)', 6000)">♾️ Örök - 6000 LC</button>
                                </div>
                            </div>

                            <!-- Titán -->
                            <div class="rank-card">
                                <div>
                                    <div class="rank-title">🛡️ Titán rang</div>
                                    <div class="rank-desc">Titán rang a 2. legnagyobb rang.

<strong>Skyblock:</strong>
- /fly parancs a szigeten
- 14 db generátor típusonként</div>
                                </div>
                                <div class="rank-buttons">
                                    <button class="btn-style btn-blue" onclick="confirmPurchase('Titán (60 napos)', 9000)">⏳ 60 napos - 9000 LC</button>
                                    <button class="btn-style btn-green" onclick="confirmPurchase('Titán (Örök)', 15000)">♾️ Örök - 15000 LC</button>
                                </div>
                            </div>

                            <!-- Dragon -->
                            <div class="rank-card">
                                <div>
                                    <div class="rank-title">🐉 Dragon rang</div>
                                    <div class="rank-desc">Dragon rang a szerveren az 1. legnagyobb rang!

<strong>Skyblock / Egyebek:</strong>
- /fly parancs
- /banya parancs használata</div>
                                </div>
                                <div class="rank-buttons">
                                    <button class="btn-style btn-purple" onclick="confirmPurchase('Dragon (60 napos)', 10000)">⏳ 60 napos - 10000 LC</button>
                                    <button class="btn-style btn-dark-purple" onclick="confirmPurchase('Dragon (Örök)', 18000)">♾️ Örök - 18000 LC</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- JavaScript Vezérlés (Web API Integrációval) -->
    <script>
        const API_URL = "http://node2.hexaverse.hu:8080/api/vcoin";
        let currentUser = "";
        let userBalance = 0;
        let dailyClaimed = false;
        let currentRank = "Alap";

        function updateUI() {
            document.getElementById('displayBalance').textContent = `🪙 Egyenleg: ${userBalance} LegendCoin`;
            document.getElementById('displayRank').textContent = `⭐ Rang: ${currentRank}`;
        }

        async function checkServerStatus() {
            const xpBarFill = document.getElementById('xpBarFill');
            const xpLevelText = document.getElementById('xpLevelText');
            const serverIp = 'node2.hexaverse.hu:8029';

            try {
                const response = await fetch(`https://api.mcsrvstat.us/3/${serverIp}`);
                const data = await response.json();

                if (data.online) {
                    const playersOnline = data.players.online;
                    const playersMax = data.players.max;
                    
                    xpBarFill.className = 'xp-bar-fill';
                    let percentage = Math.min((playersOnline / Math.max(playersMax, 100)) * 100, 100);
                    if(percentage < 15) percentage = 15;
                    
                    xpBarFill.style.width = percentage + '%';
                    xpLevelText.className = 'xp-level-text';
                    xpLevelText.textContent = `🟢 Online | Játékosok: ${playersOnline} / ${playersMax}`;
                } else {
                    setServerOffline();
                }
            } catch (error) {
                setServerOnlineFallback();
            }
        }

        function setServerOffline() {
            const xpBarFill = document.getElementById('xpBarFill');
            const xpLevelText = document.getElementById('xpLevelText');
            xpBarFill.className = 'xp-bar-fill offline';
            xpBarFill.style.width = '100%';
            xpLevelText.className = 'xp-level-text offline';
            xpLevelText.textContent = '🔴 Szerver jelenleg Offline';
        }

        function setServerOnlineFallback() {
            const xpBarFill = document.getElementById('xpBarFill');
            const xpLevelText = document.getElementById('xpLevelText');
            xpBarFill.className = 'xp-bar-fill';
            xpBarFill.style.width = '75%';
            xpLevelText.className = 'xp-level-text';
            xpLevelText.textContent = '🟢 Szerver Online | Aktív kapcsolat';
        }

        window.addEventListener('DOMContentLoaded', () => {
            checkServerStatus();
            setInterval(checkServerStatus, 60000);
        });

        function copyServerIp() {
            const ipText = "node2.hexaverse.hu:8029";
            navigator.clipboard.writeText(ipText).then(() => {
                const ipBox = document.getElementById('copyIpBtn');
                ipBox.style.borderColor = '#22c55e';
                ipBox.innerHTML = '✅ Szerver IP vágólapra másolva!';
                setTimeout(() => {
                    ipBox.innerHTML = '🌐 IP: node2.hexaverse.hu:8029 <span style="font-size: 12px; color: #94a3b8; display: block;">(Kattints a másoláshoz)</span>';
                }, 2000);
            });
        }

        function openWebshopModal() {
            const modal = document.getElementById('webshopModal');
            modal.style.display = 'flex';
            setTimeout(() => modal.classList.add('show'), 10);
        }

        function closeWebshopModal() {
            const modal = document.getElementById('webshopModal');
            modal.classList.remove('show');
            setTimeout(() => modal.style.display = 'none', 300);
        }

        async function handleLogin() {
            const username = document.getElementById('usernameInput').value.trim();
            if(!username) {
                alert('Kérlek add meg a felhasználóneved!');
                return;
            }

            try {
                const res = await fetch(`${API_URL}?player=${username}`);
                const data = await res.json();

                if (data.status === "success") {
                    currentUser = username;
                    userBalance = data.coins;

                    document.getElementById('displayUser').textContent = '👤 Üdv, ' + username;
                    document.getElementById('userHead').src = `https://minotar.net/avatar/${username}/64.png`;
                    document.getElementById('loginView').style.display = 'none';
                    document.getElementById('shopDashboard').style.display = 'flex';
                    updateUI();
                } else {
                    alert("A játékos nem található a szerver adatbázisában! Lépj be a szerverre legalább egyszer.");
                }
            } catch(e) {
                alert("Nem sikerült kapcsolódni a Minecraft szerverhez! Ellenőrizd, hogy fut-e a szerver és nyitva van-e a 8080-as port.");
            }
        }

        function handleLogout() {
            currentUser = "";
            userBalance = 0;
            document.getElementById('usernameInput').value = '';
            document.getElementById('shopDashboard').style.display = 'none';
            document.getElementById('loginView').style.display = 'flex';
        }

        function switchTab(tabId, event) {
            const tabs = document.querySelectorAll('.shop-tab');
            tabs.forEach(tab => tab.classList.remove('active-tab'));

            const buttons = document.querySelectorAll('.shop-menu-btn');
            buttons.forEach(btn => btn.classList.remove('active'));

            document.getElementById(tabId).classList.add('active-tab');
            event.currentTarget.classList.add('active');
        }

        async function claimDailyReward() {
            if(dailyClaimed) {
                alert('Már átvetted a mai jutalmat!');
                return;
            }

            try {
                const res = await fetch(API_URL, {
                    method: 'POST',
                    body: `action=add&player=${currentUser}&amount=150`
                });
                const data = await res.json();

                if (data.status === "success") {
                    userBalance += 150;
                    dailyClaimed = true;
                    updateUI();
                    
                    const btn = document.getElementById('claimBtn');
                    btn.textContent = '✅ Mára átvéve!';
                    btn.style.background = '#475569';
                    btn.style.cursor = 'not-allowed';
                    alert('Sikeresen átvetted a mai +150 LegendCoint!');
                }
            } catch(e) {
                alert("Hiba történt a jutalom jóváírásakor!");
            }
        }

        async function activateCoupon() {
            const code = document.getElementById('couponInput').value.trim().toUpperCase();
            if(code === "LEGEND2026") {
                try {
                    const res = await fetch(API_URL, {
                        method: 'POST',
                        body: `action=add&player=${currentUser}&amount=500`
                    });
                    const data = await res.json();

                    if (data.status === "success") {
                        userBalance += 500;
                        updateUI();
                        alert('🎉 Siker! A LEGEND2026 kuponkóddal kapott +500 LegendCoint jóváírtuk!');
                        document.getElementById('couponInput').value = '';
                    }
                } catch(e) {
                    alert("Hiba történt a kupon beváltásakor!");
                }
            } else if(code === "") {
                alert('Kérlek írj be egy kuponkódot!');
            } else {
                alert('❌ Érvénytelen vagy lejárt kuponkód!');
            }
        }

        async function sendMoney() {
            const target = document.getElementById('transferTarget').value.trim();
            const amount = parseInt(document.getElementById('transferAmount').value);

            if(!target) {
                alert('Adja meg a címzett nevét!');
                return;
            }
            if(isNaN(amount) || amount <= 0) {
                alert('Adjon meg egy érvényes összeget!');
                return;
            }
            if(amount > userBalance) {
                alert('❌ Nincs elegendő LegendCoinod az utaláshoz!');
                return;
            }

            try {
                // 1. Összeg levonása a küldőtől a szerveren
                await fetch(API_URL, { method: 'POST', body: `action=remove&player=${currentUser}&amount=${amount}` });
                // 2. Összeg jóváírása a fogadónál a szerveren
                await fetch(API_URL, { method: 'POST', body: `action=add&player=${target}&amount=${amount}` });

                userBalance -= amount;
                updateUI();
                alert(`💸 Sikeresen átutaltál ${amount} LegendCoint ${target} játékosnak!`);
                document.getElementById('transferTarget').value = '';
                document.getElementById('transferAmount').value = '';
            } catch(e) {
                alert("Hiba történt az utalás során!");
            }
        }

        async function confirmPurchase(rankName, price) {
            if(userBalance < price) {
                alert(`❌ Nincs elegendő LegendCoinod! Ehhez a ranghoz még ${price - userBalance} LC hiányzik.`);
                return;
            }

            if(confirm(`Biztosan meg szeretnéd vásárolni a következőt: ${rankName} (${price} LegendCoin)?`)) {
                try {
                    const res = await fetch(API_URL, {
                        method: 'POST',
                        body: `action=remove&player=${currentUser}&amount=${price}`
                    });
                    const data = await res.json();

                    if (data.status === "success") {
                        userBalance -= price;
                        currentRank = rankName.split(' ')[0];
                        updateUI();
                        alert(`🎉 Sikeres vásárlás! Megvásároltad a következőt: ${rankName}.`);
                    }
                } catch(e) {
                    alert("Hiba történt a vásárlás során!");
                }
            }
        }
    </script>
</body>
</html>