@extends('admin.layouts.app')

@section('content')
<style>
    :root {
        --primary-color: #6366f1;
        --primary-dark: #4f46e5;
        --success-color: #10b981;
        --info-color: #0ea5e9;
        --warning-color: #f59e0b;
        --danger-color: #ef4444;
        --light-bg: #f9fafb;
        --light-text: #111827;
        --dark-bg: #0f172a;
        --dark-bg-secondary: #1e293b;
        --dark-card: #1e293b;
        --dark-text: #f1f5f9;
        --border-color: #e5e7eb;
    }

    body {
        background-color: var(--light-bg);
        color: var(--light-text);
        transition: all 0.3s ease;
    }

    body.dark-mode {
        background-color: var(--dark-bg);
        color: var(--dark-text);
    }

    /* Theme Toggle Button */
    .theme-toggle-btn {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1000;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        border: none;
        color: white;
        padding: 12px 24px;
        border-radius: 50px;
        cursor: pointer;
        box-shadow: 0 8px 24px rgba(99, 102, 241, 0.3);
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .theme-toggle-btn:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(99, 102, 241, 0.4);
    }

    .theme-toggle-btn:active {
        transform: translateY(-1px);
    }

    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, var(--primary-color) 0%, #8b5cf6 50%, #ec4899 100%);
        background-size: 400% 400%;
        animation: gradientShift 15s ease infinite;
        border-radius: 20px;
        padding: 60px 40px;
        color: white;
        margin-bottom: 40px;
        box-shadow: 0 20px 60px rgba(99, 102, 241, 0.2);
        position: relative;
        overflow: hidden;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        filter: blur(40px);
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-30px); }
    }

    .hero-content {
        position: relative;
        z-index: 1;
    }

    .hero-section h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 15px;
        text-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        letter-spacing: -1px;
    }

    .hero-section p {
        font-size: 1.2rem;
        opacity: 0.95;
        margin-bottom: 0;
        font-weight: 500;
    }

    body.dark-mode .hero-section {
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #db2777 100%);
        box-shadow: 0 20px 60px rgba(99, 102, 241, 0.15);
    }

    /* Statistics Section */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 24px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: white;
        border-radius: 18px;
        padding: 32px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        border: 1px solid var(--border-color);
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        overflow: hidden;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    body.dark-mode .stat-card {
        background: var(--dark-card);
        border-color: #334155;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), #8b5cf6);
    }

    .stat-card.card-users::before {
        background: linear-gradient(90deg, #6366f1, #3b82f6);
    }

    .stat-card.card-categories::before {
        background: linear-gradient(90deg, #10b981, #14b8a6);
    }

    .stat-card.card-articles::before {
        background: linear-gradient(90deg, #0ea5e9, #06b6d4);
    }

    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 40px rgba(99, 102, 241, 0.15);
        border-color: var(--primary-color);
    }

    .stat-card-content {
        flex: 1;
    }

    .stat-label {
        font-size: 0.9rem;
        color: #6b7280;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 12px;
    }

    body.dark-mode .stat-label {
        color: #cbd5e1;
    }

    .stat-value {
        font-size: 2.8rem;
        font-weight: 800;
        background: linear-gradient(135deg, var(--primary-color), #8b5cf6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: 0;
    }

    .stat-icon-wrapper {
        width: 80px;
        height: 80px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin-left: 20px;
        flex-shrink: 0;
    }

    .stat-card.card-users .stat-icon-wrapper {
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.2), rgba(59, 130, 246, 0.2));
        color: #3b82f6;
    }

    .stat-card.card-categories .stat-icon-wrapper {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(20, 184, 166, 0.2));
        color: #14b8a6;
    }

    .stat-card.card-articles .stat-icon-wrapper {
        background: linear-gradient(135deg, rgba(14, 165, 233, 0.2), rgba(6, 182, 212, 0.2));
        color: #06b6d4;
    }

    body.dark-mode .stat-card.card-users .stat-icon-wrapper {
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.3), rgba(59, 130, 246, 0.3));
    }

    body.dark-mode .stat-card.card-categories .stat-icon-wrapper {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.3), rgba(20, 184, 166, 0.3));
    }

    body.dark-mode .stat-card.card-articles .stat-icon-wrapper {
        background: linear-gradient(135deg, rgba(14, 165, 233, 0.3), rgba(6, 182, 212, 0.3));
    }

    /* Action Cards */
    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 24px;
        margin-bottom: 40px;
    }

    .action-card {
        background: white;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        border: 1px solid var(--border-color);
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        display: flex;
        flex-direction: column;
    }

    body.dark-mode .action-card {
        background: var(--dark-card);
        border-color: #334155;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
    }

    .action-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 40px rgba(99, 102, 241, 0.15);
    }

    .action-card-header {
        background: linear-gradient(135deg, var(--primary-color), #8b5cf6);
        color: white;
        padding: 32px 24px;
        position: relative;
        overflow: hidden;
    }

    .action-card-header::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: pulse-float 3s ease-in-out infinite;
    }

    @keyframes pulse-float {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(20px, -20px) scale(1.1); }
    }

    .action-card-header h5 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0;
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .action-card-body {
        padding: 28px;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .action-btn {
        padding: 16px 24px;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        font-size: 1rem;
    }

    .action-btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
    }

    .action-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.4);
        color: white;
    }

    .action-btn-success {
        background: linear-gradient(135deg, var(--success-color), #059669);
        color: white;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }

    .action-btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(16, 185, 129, 0.4);
        color: white;
    }

    .action-btn-info {
        background: linear-gradient(135deg, var(--info-color), #0284c7);
        color: white;
        box-shadow: 0 4px 12px rgba(14, 165, 233, 0.3);
    }

    .action-btn-info:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(14, 165, 233, 0.4);
        color: white;
    }

    /* Summary Section */
    .summary-section {
        background: white;
        border-radius: 18px;
        padding: 40px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        border: 1px solid var(--border-color);
    }

    body.dark-mode .summary-section {
        background: var(--dark-card);
        border-color: #334155;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
    }

    .summary-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 30px;
        font-size: 1.3rem;
        font-weight: 700;
    }

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .summary-item {
        text-align: center;
        padding: 20px;
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.05), rgba(139, 92, 246, 0.05));
        border-radius: 12px;
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
    }

    body.dark-mode .summary-item {
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(139, 92, 246, 0.1));
        border-color: #334155;
    }

    .summary-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.1);
    }

    .summary-value {
        font-size: 2rem;
        font-weight: 800;
        background: linear-gradient(135deg, var(--primary-color), #8b5cf6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 8px;
    }

    .summary-label {
        font-size: 0.9rem;
        color: #6b7280;
        font-weight: 600;
    }

    body.dark-mode .summary-label {
        color: #cbd5e1;
    }

    /* Smooth scroll and transitions */
    * {
        transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
    }

    .container-fluid {
        padding: 30px 0;
    }
</style>

<!-- Theme Toggle Button -->
<button class="theme-toggle-btn" onclick="toggleTheme()" title="Toggle Dark/Light Mode">
    <i class="fas fa-moon" id="theme-icon"></i>
    <span id="theme-text">Dark</span>
</button>

<div class="container-fluid">
    <!-- Hero Section with Animation -->
    <div class="hero-section">
        <div class="hero-content">
            <h1>
                <i class="fas fa-chart-line"></i> Dashboard Analytics
            </h1>
            <p>Kelola konten website Anda dengan mudah dan efisien. Pantau statistik real-time dan kelola semua data dari satu tempat.</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="stats-grid">
        <!-- Users Card -->
        <div class="stat-card card-users">
            <div class="stat-card-content">
                <div class="stat-label">👥 Total Pengguna</div>
                <p class="stat-value">{{ \App\Models\User::count() }}</p>
            </div>
            <div class="stat-icon-wrapper">
                <i class="fas fa-users"></i>
            </div>
        </div>

        <!-- Categories Card -->
        <div class="stat-card card-categories">
            <div class="stat-card-content">
                <div class="stat-label">📁 Total Kategori</div>
                <p class="stat-value">{{ \App\Models\Category::count() }}</p>
            </div>
            <div class="stat-icon-wrapper">
                <i class="fas fa-list"></i>
            </div>
        </div>

        <!-- Articles Card -->
        <div class="stat-card card-articles">
            <div class="stat-card-content">
                <div class="stat-label">📰 Total Berita</div>
                <p class="stat-value">{{ \App\Models\Article::count() }}</p>
            </div>
            <div class="stat-icon-wrapper">
                <i class="fas fa-newspaper"></i>
            </div>
        </div>
    </div>

    <!-- Action Cards Section -->
    <div class="actions-grid">
        <!-- Quick Actions Card -->
        <div class="action-card">
            <div class="action-card-header">
                <h5>⚡ Aksi Cepat</h5>
            </div>
            <div class="action-card-body">
                <a href="{{ route('articles.create') }}" class="action-btn action-btn-primary">
                    <i class="fas fa-feather-alt"></i> Tulis Berita Baru
                </a>
                <a href="{{ route('categories.create') }}" class="action-btn action-btn-success">
                    <i class="fas fa-folder-plus"></i> Tambah Kategori
                </a>
                <a href="{{ route('users.index') }}" class="action-btn action-btn-info">
                    <i class="fas fa-user-cog"></i> Kelola Pengguna
                </a>
            </div>
        </div>

        <!-- Management Card -->
        <div class="action-card">
            <div class="action-card-header" style="background: linear-gradient(135deg, #10b981, #059669);">
                <h5>🛠️ Manajemen</h5>
            </div>
            <div class="action-card-body">
                <a href="{{ route('articles.index') }}" class="action-btn action-btn-primary">
                    <i class="fas fa-book"></i> Lihat Semua Berita
                </a>
                <a href="{{ route('categories.index') }}" class="action-btn action-btn-success">
                    <i class="fas fa-tags"></i> Lihat Semua Kategori
                </a>
                <a href="{{ route('users.create') }}" class="action-btn action-btn-info">
                    <i class="fas fa-user-plus"></i> Tambah Pengguna Baru
                </a>
            </div>
        </div>

        <!-- Info Card -->
        <div class="action-card">
            <div class="action-card-header" style="background: linear-gradient(135deg, #0ea5e9, #0284c7);">
                <h5>ℹ️ Informasi</h5>
            </div>
            <div class="action-card-body">
                <div style="flex: 1; display: flex; flex-direction: column; justify-content: center; gap: 12px; color: inherit;">
                    <p style="margin-bottom: 10px; opacity: 0.9;">
                        <strong>Sistem Management Berita Modern</strong><br>
                        Kelola semua konten website Anda dengan interface yang intuitif dan responsif.
                    </p>
                    <small style="opacity: 0.7;">✨ Dengan fitur dark mode dan animasi yang menarik</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Summary Section -->
    <div class="summary-section">
        <div class="summary-header">
            <i class="fas fa-chart-pie"></i> Ringkasan Lengkap
        </div>
        
        <div class="summary-grid">
            <div class="summary-item">
                <div class="summary-value">{{ \App\Models\User::count() }}</div>
                <div class="summary-label">Pengguna Aktif</div>
            </div>
            <div class="summary-item">
                <div class="summary-value">{{ \App\Models\Category::count() }}</div>
                <div class="summary-label">Kategori</div>
            </div>
            <div class="summary-item">
                <div class="summary-value">{{ \App\Models\Article::count() }}</div>
                <div class="summary-label">Total Artikel</div>
            </div>
        </div>

        <div style="text-align: center; padding-top: 20px; border-top: 1px solid var(--border-color);">
            <small style="color: #6b7280; font-weight: 500;">
                <i class="fas fa-sync-alt"></i> Data diperbarui secara real-time
            </small>
        </div>
    </div>

</div>

<script>
    // Initialize theme from localStorage
    function initializeTheme() {
        const isDarkMode = localStorage.getItem('darkMode') === 'true';
        const body = document.body;
        const themeIcon = document.getElementById('theme-icon');
        const themeText = document.getElementById('theme-text');

        if (isDarkMode) {
            body.classList.add('dark-mode');
            themeIcon.classList.remove('fa-moon');
            themeIcon.classList.add('fa-sun');
            themeText.textContent = 'Light';
        }
    }

    // Toggle Theme Function
    function toggleTheme() {
        const body = document.body;
        const themeIcon = document.getElementById('theme-icon');
        const themeText = document.getElementById('theme-text');
        const isDarkMode = body.classList.toggle('dark-mode');

        // Save preference
        localStorage.setItem('darkMode', isDarkMode);

        // Update icon and text
        if (isDarkMode) {
            themeIcon.classList.remove('fa-moon');
            themeIcon.classList.add('fa-sun');
            themeText.textContent = 'Light';
        } else {
            themeIcon.classList.remove('fa-sun');
            themeIcon.classList.add('fa-moon');
            themeText.textContent = 'Dark';
        }
    }

    // Initialize theme on page load
    document.addEventListener('DOMContentLoaded', initializeTheme);
</script>

@endsection
